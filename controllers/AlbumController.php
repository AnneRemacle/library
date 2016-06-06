<?php
namespace Controllers;
use Models\Album as AlbumModel;
use Models\Artist as ArtistModel;
use Models\Genre as GenreModel;
use Models\Label as LabelModel;
use Models\Room as RoomModel;
class Album extends Base {
	private $AlbumModel = null;
	public function __construct(AlbumModel $AlbumModel, ArtistModel $ArtistModel, GenreModel $GenreModel, LabelModel $LabelModel, RoomModel $RoomModel) {
		$this->AlbumModel = $AlbumModel;
		$this->ArtistModel = $ArtistModel;
		$this->GenreModel = $GenreModel;
		$this->LabelModel = $LabelModel;
		$this->RoomModel = $RoomModel;
	}
	public function index() {
		$data = [];
		$data[ 'albums' ] = $this->AlbumModel->getAlbums();
		$data[ 'artists' ] = $this->ArtistModel->getArtists();
		$data[ 'view' ] = 'index_album.php';
		$data[ 'totalAlbums' ] = count( $data[ 'albums'] );
		$data[ 'pages' ] = ceil( $data[ 'totalAlbums' ] / MAX_ALBUMS_PER_PAGE );
		if( isset( $_GET[ 'page' ] ) ) {
			$data[ 'currentPage' ] = intval( $_GET[ 'page' ] );
			if( $data[ 'currentPage' ] > $data[ 'pages' ] ) {
				$data[ 'currentPage' ] = $data[ 'pages' ];
			}
		} else {
			$data[ 'currentPage' ] = 1;
		}
		$data[ 'firstEntry' ] = ( $data[ 'currentPage' ] - 1 ) * MAX_ALBUMS_PER_PAGE;
		$data[ 'albumsOnPage' ] = $this->AlbumModel->getAlbumsOnPage( $data[ 'firstEntry'] );
		return $data;
	}
	public function view() {
		$id = $_REQUEST[ 'id' ];
		$data = [];
		$data[ 'album' ] = $this->AlbumModel->getAlbum( $id );
		$data[ 'artist' ] = $this->ArtistModel->getArtist( $data[ 'album' ][ 'artist_id' ] );
		$data[ 'genre' ] = $this->GenreModel->getGenre( $data[ 'album' ][ 'genre_id' ] );
		$data[ 'label' ] = $this->LabelModel->getLabel( $data[ 'album' ][ 'label_id' ] );
		$data[ 'room' ] = $this->RoomModel->getRoom( $data[ 'album' ][ 'room_id' ] );
		$data[ 'tracks' ] = json_decode( $data[ 'album' ][ 'tracks' ], true );
		$data['view'] = 'view_album.php';
		return $data;
	}
	public function add() {
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
			$data = [];
			$data[ 'view' ] = 'add_album.php';
			$data[ 'artists' ] = $this->ArtistModel->getArtists();
			$data[ 'genres' ] = $this->GenreModel->getGenres();
			$data[ 'rooms' ] = $this->RoomModel->getRooms();
			$data[ 'labels' ] = $this->LabelModel->getLabels();
			return $data;
		}
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
			
			$data[ 'errors' ] = [];
			if( empty( $_POST[ 'title' ] ) ) {
				$data[ 'errors' ][ 'title' ] = true;
				$data[ 'errors' ][ 'title' ][ 'message' ] = 'Veuillez entrer un titre';
			}
			if( empty( $_POST[ 'year' ] ) ) {
				$data[ 'errors' ][ 'year' ] = true;
				$data[ 'errors' ][ 'year' ][ 'message' ] = 'Veuillez entrer une année';
			}			
			if( isset( $_FILES[ 'cover_url' ] ) ) {
				$cover = $_FILES[ 'cover_url' ];
				if( $cover[ 'error' ] != 0 ) {
					switch( $cover[ 'error' ] ) {
						case UPLOAD_ERR_FORM_SIZE :
							die( 'Il semblerait que vous essayez d\'envoyer un fichier trop volumineux.' );
						default :
							die( 'Une erreur inconnue s\'est produite.' );
					}
				} else {
					$cover_url = './files/covers/'.$cover[ 'name' ];
					if( !@move_uploaded_file( $cover['tmp_name'], $cover_url ) ) {
						// Ajouter @ devant une fonction permet de ne pas afficher l'erreur
						die( "Un problème s'est posé lors de l'upload du cover fichier le serveur" );
					}
				}
			} else {
				$data[ 'errors' ][ 'cover_url' ] = true;
			}
			$tracks = array( "name" => array() , "path" => array() );
			if( isset( $_FILES[ 'tracks' ] ) ) {
				$fichiers = $_FILES[ 'tracks' ];
				$erreurs = 0;
				$i;
				for( $i = 0 ; $i < count( $fichiers['error'] ) ; $i++ ) {
					// parcourir le tableau des erreurs et voir si c'est égal à 0
					if( $fichiers['error'][$i] !== 0 ) {
						switch( $fichiers[ 'error' ][$i] ) {
							case UPLOAD_ERR_FORM_SIZE:
								$erreurs++;
								die( 'Il semblerait que vous essayez d\'envoyer un fichier trop gros.' );
								break;
							default:
								$erreurs++;
								die( 'Une erreur inconnue s\'est produite.' );
						} 
					} else {
						// le fichier ne comporte pas d'erreur
						if( preg_match( '/\d+[ ][-][ ]/', $fichiers[ 'name' ][ $i ] ) ) {
							$trackNameParts = preg_split( '/\d+[ ][-][ ]/', $fichiers[ 'name' ][ $i ] );
							$trackName = end( $trackNameParts );
							$trackNameParts = explode( '.', $trackName );
							$trackName = reset( $trackNameParts );
						} elseif( preg_match( '/\d+[.][ ]/', $fichiers[ 'name' ][ $i ] ) ) {
							$trackNameParts = preg_split( '/\d+[.][ ]/', $fichiers[ 'name' ][ $i ] );
							$trackName = end( $trackNameParts );
							$trackNameParts = explode( '.', $trackName );
							$trackName = reset( $trackNameParts );
						} elseif( preg_match( '/\d+[ ]/', $fichiers[ 'name' ][ $i ] ) ) {
							$trackNameParts = preg_split( '/\d+[ ]/', $fichiers[ 'name' ][ $i ] );
							$trackName = end( $trackNameParts );
							$trackNameParts = explode( '.', $trackName );
							$trackName = reset( $trackNameParts );
						} else {
							$trackNameParts = explode( '.', $fichiers[ 'name' ][ $i ] );
							$trackName = reset( $trackNameParts );
						}
						$path = './files/tracks/' . $fichiers[ 'name' ][ $i ];
						if( !@move_uploaded_file( $fichiers[ 'tmp_name' ][ $i ], $path) ) {
							die( 'Un problème est survenu lors de l\'upload du fichier sur le serveur' );
						}
						array_push( $tracks[ 'name' ], $trackName );
						array_push( $tracks[ 'path' ], $path );
					}
				}
			} else {
				$data[ 'errors' ][ 'tracks' ] = true;
			}
			if( count( $data[ 'errors' ] ) == 0) {
				if( $_POST[ 'artist_name' ] != '' ) {
					$artist = $this->ArtistModel->addArtist( $_POST[ 'artist_name' ], '' );
					$artist_id = $artist[ 'id' ];
				} else {
					$artist_id = $_POST[ 'artist_id' ];
				}			
				if( $_POST[ 'genre_name' ] != '' ) {
					$genre = $this->GenreModel->addGenre( $_POST[ 'genre_name' ] );
					$genre_id = $genre[ 'id' ];
				} else {
					$genre_id = $_POST[ 'genre_id' ];
				}			
				if( $_POST[ 'room_name' ] != '' ) {
					$room = $this->RoomModel->addRoom( $_POST[ 'room_name' ] );
					$room_id = $room[ 'id' ];
				} else {
					$room_id = $_POST[ 'room_id' ];
				}			
				if( $_POST[ 'label_name' ] != '' ) {
					$label = $this->LabelModel->addLabel( $_POST[ 'label_name' ] );
					$label_id = $label[ 'id' ];
				} else {
					$label_id = $_POST[ 'label_id' ];
				}
				$this->AlbumModel->addAlbum( $_POST[ 'title'], $artist_id, $genre_id, $room_id, $label_id, $cover_url, json_encode( $tracks ), $_POST[ 'year' ] );
				header( 'Location: http://localhost/mediatheque/index.php?a=index&e=album' );
			} else {
				$data[ 'view' ] = 'add_album.php';
				$data[ 'title' ] = $_POST[ 'title' ];
				$data[ 'year' ] = $_POST[ 'year' ];
				$data[ 'artists' ] = $this->ArtistModel->getArtists();
				$data[ 'genres' ] = $this->GenreModel->getGenres();
				$data[ 'rooms' ] = $this->RoomModel->getRooms();
				$data[ 'labels' ] = $this->LabelModel->getLabels();
				return $data;
			}
		}
	}
	public function delete() {
 		$id = $_REQUEST[ 'id' ];
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
			$data[ 'album' ] = $this->AlbumModel->getAlbum( $id );
			$data[ 'artist' ] = $this->ArtistModel->getArtist( $data[ 'album' ][ 'artist_id'] );
			$data[ 'genre' ] = $this->GenreModel->getGenre( $data[ 'album' ][ 'genre_id'] );
			$data[ 'label' ] = $this->LabelModel->getLabel( $data[ 'album' ][ 'label_id'] );
			$data[ 'room' ] = $this->RoomModel->getRoom( $data[ 'album' ][ 'room_id'] );
			$data[ 'view' ] = 'delete_album.php';
			return $data;
		}
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
			$this->AlbumModel->deleteAlbum( $id );
			header( 'Location: http://localhost/mediatheque/index.php?a=index&e=album');
		}
	}
	public function update() {
		$id = $_REQUEST[ 'id' ];
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
			$data[ 'album' ] = $this->AlbumModel->getAlbum( $id );
			$data[ 'artist' ] = $this->ArtistModel->getArtist( $data[ 'album' ][ 'artist_id' ] );
			$data[ 'genre' ] = $this->GenreModel->getGenre( $data[ 'album' ][ 'genre_id' ] );
			$data[ 'label' ] = $this->LabelModel->getLabel( $data[ 'album' ][ 'label_id'] );
			$data[ 'room' ] = $this->RoomModel->getRoom( $data[ 'album' ][ 'room_id' ] );
			$data[ 'artists' ] = $this->ArtistModel->getArtists();
			$data[ 'genres' ] = $this->GenreModel->getGenres();
			$data[ 'labels' ] = $this->LabelModel->getLabels();
			$data[ 'rooms' ] = $this->RoomModel->getRooms();
			$data[ 'tracks' ] = json_decode( $data[ 'album' ][ 'tracks' ] );
			$data[ 'view' ] = 'update_album.php';
			return $data;
		}
		if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
			
			$data[ 'errors' ] = [];
			$data[ 'album' ] = $this->AlbumModel->getAlbum( $id );
			if( empty( $_POST[ 'title' ] ) ) {
				$data[ 'errors' ][ 'title' ] = true;
			}
			if( empty( $_POST[ 'year' ] ) ) {
				$data[ 'errors' ][ 'year' ] = true;
			}
			if( count( $data[ 'errors' ] ) == 0 ) {
				if( $_POST[ 'artist_name' ] != '' ) {
					$artist = $this->ArtistModel->addArtist( $_POST[ 'artist_name' ], '' );
					$artist_id = $artist[ 'id' ];
				} else {
					$artist_id = $_POST[ 'artist_id' ];
				}			
				if( $_POST[ 'genre_name' ] != '' ) {
					$genre = $this->GenreModel->addGenre( $_POST[ 'genre_name' ] );
					$genre_id = $genre[ 'id' ];
				} else {
					$genre_id = $_POST[ 'genre_id' ];
				}			
				if( $_POST[ 'room_name' ] != '' ) {
					$room = $this->RoomModel->addRoom( $_POST[ 'room_name' ] );
					$room_id = $room[ 'id' ];
				} else {
					$room_id = $_POST[ 'room_id' ];
				}			
				if( $_POST[ 'label_name' ] != '' ) {
					$label = $this->LabelModel->addLabel( $_POST[ 'label_name' ] );
					$label_id = $label[ 'id' ];
				} else {
					$label_id = $_POST[ 'label_id' ];
				}
				$this->AlbumModel->updateAlbum( $id, $_POST[ 'title' ], $artist_id, $genre_id, $room_id, $label_id, $_POST[ 'year' ] );
				header( 'Location: http://localhost/mediatheque/index.php?a=view&e=album&id=' . $id );
			} else {
				$data[ 'view' ] = 'update_album.php';
				$data[ 'title' ] = $_POST[ 'title' ];
				$data[ 'year' ] = $_POST[ 'year' ];
				$data[ 'album' ] = $this->AlbumModel->getAlbum( $id );
				$data[ 'artists' ] = $this->ArtistModel->getArtists();
				$data[ 'genres' ] = $this->GenreModel->getGenres();
				$data[ 'rooms' ] = $this->RoomModel->getRooms();
				$data[ 'labels' ] = $this->LabelModel->getLabels();
				return $data;
			}
		}
	}
}
<?php

class FtpHelper
{
    static function writeFileOnFtp($ftp_server,$ftp_username,$ftp_password,$ftp_folder,$local_file){
        $ftp_connection = ftp_connect($ftp_server);

        // login on server
        $login = ftp_login($ftp_connection, $ftp_username, $ftp_password);

        // check if connection has been done
        if(!$ftp_connection || !$login){
            echo "Connessione fallita!";
        } else {
            // if connected with ftp i will upload file
            $upload = ftp_put($ftp_connection, $ftp_folder, $local_file, FTP_BINARY);

            // close ftp connection
            ftp_quit($ftp_connection);

            // Return uploaded status
            return $upload;

        }
    }

    static function takeFileFromFtp($ftp_server,$ftp_username,$ftp_password,$localPath,$remoteFile){
        $ftp_connection = ftp_connect($ftp_server);
        // effetto login sul server
        $login = ftp_login($ftp_connection, $ftp_username, $ftp_password);
        // controllo se la connessione ha avuto buon fine
        if(!$ftp_connection || !$login){
            echo "Connessione fallita!";
        } else {
            $download = ftp_get($ftp_connection, $localPath, $remoteFile, FTP_BINARY);
            // controllo se download andato a buon fine
            if (!$download) {
                //echo "Si è verificato un errore durante il download!<br>";
            } else {
                //echo "Download avvenuto con successo<br>";
            }
            ftp_quit($ftp_connection);
        }
    }
}
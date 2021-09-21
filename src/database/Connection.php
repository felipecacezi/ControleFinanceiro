<?php

class Connection
{

    public function connection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
            $dsn = "pgsql:host=kesavan.db.elephantsql.com;port=5432;dbname=yrnqpvqw;";
            // make a database connection
            $pdo = new PDO($dsn, 'yrnqpvqw', 'ScUfUBolCF7qUDehUrzBVy4yAaSJcAJb', $options);
            
            return $pdo;
            
        } catch (PDOException $e) {

            return 'error_to_connect_db';

        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }

    }
    
}
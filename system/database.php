<?php
defined("BASEPATH") or exit("No direct script access allowed.");
$database = $_CONFIG['db'];

// Try to connect to database, but handle gracefully if not available
$db = false;
try {
    $db = mysqli_connect($database['host'], $database['username'], $database['password'], $database['name']);
    if (!$db) {
        throw new Exception("Database connection failed");
    }
} catch (Exception $e) {
    // Database not available - create mock database object for development
    $db = new class {
        public function query($sql) {
            return new class {
                public function fetch_assoc() {
                    // Return default data for demo mode
                    if (strpos($sql, 'reCapcha') !== false) {
                        return [
                            'keyworld' => 'topup, game, pulsa',
                            'maintenance' => 'false',
                            'reason_mt' => ''
                        ];
                    }
                    return [];
                }
                public function num_rows() {
                    return 0;
                }
            };
        }
        public function real_escape_string($string) {
            return addslashes($string);
        }
    };
    
    // Set a flag to indicate demo mode
    define('DEMO_MODE', true);
    
    // Override mysqli functions for demo mode
    if (!function_exists('mysqli_num_rows')) {
        function mysqli_num_rows($result) {
            return 0;
        }
    }
}

// Helper function to check if we have a real database
function has_database() {
    global $db;
    return !defined('DEMO_MODE');
}

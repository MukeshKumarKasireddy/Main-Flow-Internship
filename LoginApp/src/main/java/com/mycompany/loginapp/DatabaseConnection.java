/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author kasir
 */
package com.mycompany.loginapp;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection {
    private static final String URL = "jdbc:mysql://localhost:3306/user_auth?useSSL=false&serverTimezone=UTC";
    private static final String USER = "app_user";
    private static final String PASSWORD = "Secure@123";

    public static Connection getConnection() throws SQLException {
        
        return DriverManager.getConnection(URL, USER, PASSWORD);
    }

    // Test the connection (optional)
    public static void main(String[] args) {
       
    }
}

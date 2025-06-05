/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.loginapp;

import java.sql.Connection;
import java.sql.SQLException;
/**
 *
 * @author kasir
 */
public class TestConnection {
  public static void main(String[] args){
    try (Connection conn = DatabaseConnection.getConnection()){
    System.out.println("Connection successful!");
    System.out.println("MySQL Version: " + conn.getMetaData().getDatabaseProductVersion());
} catch (SQLException e){
    System.out.println("Connectionj failed..");
        e.printStackTrace();
}
}
  public static void testSpecificFeature(){
  }
  }
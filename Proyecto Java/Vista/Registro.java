package Vista;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author mony
 */
import control.ManejoBoton;
import java.time.LocalDate;
import javafx.application.Application; 
import javafx.collections.FXCollections; 
import javafx.collections.ObservableList; 
import javafx.event.ActionEvent;
import javafx.event.EventHandler;

import javafx.geometry.Insets; 
import javafx.geometry.Pos; 

import javafx.scene.Scene; 
import javafx.scene.control.Button; 
import javafx.scene.control.CheckBox; 
import javafx.scene.control.ChoiceBox; 
import javafx.scene.control.DatePicker; 
import javafx.scene.control.ListView; 
import javafx.scene.control.RadioButton; 
import javafx.scene.layout.GridPane; 
import javafx.scene.text.Text; 
import javafx.scene.control.TextField; 
import javafx.scene.control.ToggleGroup;  
import javafx.scene.control.ToggleButton; 
import javafx.stage.Stage; 

public class Registro extends Application { 
   @Override 
   public void start(Stage stage) {    
      Text lbnombre = new Text("Nombre"); 
            
      TextField txtnombre = new TextField(); 
             
      Text lbfecha = new Text("Fecha de Nacimiento"); 
      
      //date picker para elegir fecha
      DatePicker datePicker = new DatePicker(); 
      //recuperar la fecha    LocalDate localDate= datePicker.getValue();
             
      Text lbgenero = new Text("Genero"); 
      
      //Toggle group of radio buttons       
      ToggleGroup grupoGenero = new ToggleGroup(); 
      RadioButton radiomasc = new RadioButton("Masculino"); 
      radiomasc.setToggleGroup(grupoGenero); 
      RadioButton radiofem = new RadioButton("Femenino"); 
      radiofem.setToggleGroup(grupoGenero); 
          
      //Label for technologies known 
      Text lbTecnologias = new Text("Tecnologias que conoce"); 
      
      //check box for education 
      CheckBox javaCheckBox = new CheckBox("Java"); 
      javaCheckBox.setIndeterminate(false); 
      
      //check box for education 
      CheckBox dotnetCheckBox = new CheckBox("DotNet"); 
      javaCheckBox.setIndeterminate(false); 
       
      
      
      
      
      //Label for education 
      Text educationLabel = new Text("Areas de Interes"); 
      
      //list View for educational qualification 
      ObservableList<String> names = FXCollections.observableArrayList( 
         "Ingenieria", "Programación", "Redes", "Inteligencia Artificial", "Web"); 
      ListView<String> educationListView = new ListView<String>(names); 
            
      Text locationLabel = new Text("Localidad"); 
      
      //Choice box for location 
      ChoiceBox locationchoiceBox = new ChoiceBox(); 
      locationchoiceBox.getItems().addAll
         ("Veracruz", "Puebla", "Nuevo León", "CDMX", "Oaxaca"); 
      
      
      
      //Label for register 
      Button buttonRegister = new Button("Registro");   
      
      buttonRegister.setOnAction(new ManejoBoton(
                txtnombre,datePicker,radiomasc,radiofem,javaCheckBox,dotnetCheckBox,educationListView,locationchoiceBox));
      //....,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
      
      Button salir = new Button("Salir");   
      
      salir.setOnAction(new EventHandler<ActionEvent>(){
       
        @Override
          public void handle(ActionEvent event){
           System.exit(0);
        
          }
    });    
      
      Button consultar = new Button("Consultar");
      Button eliminar = new Button("Eliminar");
      
      
     // buttonRegister.setOnAction(new ManejoBoton(
       //         );
      
      
      //Creating a Grid Pane 
      GridPane gridPane = new GridPane();    
      
      //Setting size for the pane 
      gridPane.setMinSize(520, 520); 
       
      //Setting the padding    
      gridPane.setPadding(new Insets(10, 10, 10, 10));  
      
      //Setting the vertical and horizontal gaps between the columns 
      gridPane.setVgap(5); 
      gridPane.setHgap(5);       
      
      //Setting the Grid alignment 
      gridPane.setAlignment(Pos.CENTER); 
       
      //Arranging all the nodes in the grid 
      gridPane.add(lbnombre, 0, 0); 
      gridPane.add(txtnombre, 1, 0); 
       
      gridPane.add(lbfecha, 0, 1);       
      gridPane.add(datePicker, 1, 1); 
      
      gridPane.add(lbgenero, 0, 2); 
      gridPane.add(radiomasc, 1, 2);       
      gridPane.add(radiofem, 2, 2); 
      
       
      gridPane.add(lbTecnologias, 0, 4); 
      gridPane.add(javaCheckBox, 1, 4);       
      gridPane.add(dotnetCheckBox, 2, 4);  
       
      gridPane.add(educationLabel, 0, 5); 
      gridPane.add(educationListView, 1, 5);      
       
      gridPane.add(locationLabel, 0, 6); 
      gridPane.add(locationchoiceBox, 1, 6);    
       
      gridPane.add(buttonRegister, 2, 9);      
      gridPane.add(salir, 1, 8);      
      gridPane.add(consultar, 1, 9);
      gridPane.add(eliminar, 2, 8);
      
      //Styling nodes   
      buttonRegister.setStyle("-fx-background-color: DARKTURQUOISE; -fx-textfill: white;"); 
      salir.setStyle("-fx-background-color: DARKTURQUOISE; -fx-textfill: white;"); 
      consultar.setStyle("-fx-background-color: DARKTURQUOISE; -fx-textfill: white;");
      eliminar.setStyle("-fx-background-color: DARKTURQUOISE; -fx-textfill: white;");
      
     lbnombre.setStyle("-fx-font: normal bold 15px 'serif' "); 
     lbfecha.setStyle("-fx-font: normal bold 15px 'serif' "); 
     lbgenero.setStyle("-fx-font: normal bold 15px 'serif' "); 
      
      lbTecnologias.setStyle("-fx-font: normal bold 15px 'serif' "); 
      educationLabel.setStyle("-fx-font: normal bold 15px 'serif' "); 
      locationLabel.setStyle("-fx-font: normal bold 15px 'serif' "); 
       
      //Setting the back ground color 
      gridPane.setStyle("-fx-background-color: BEIGE;");       
       
      //Creating a scene object 
      Scene scene = new Scene(gridPane); 
      
      //Setting title to the Stage 
      stage.setTitle("Formulario de Registro"); 
         
      //Adding scene to the stage 
      stage.setScene(scene);  
      
      //Displaying the contents of the stage 
      stage.show(); 
   }      
   public static void main(String args[]){ 
      launch(args); 
   } 
}

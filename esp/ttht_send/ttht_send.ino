//⠀⠀⠀⠀⣠⣶⡾⠏⠉⠙⠳⢦⡀⠀⠀⠀⢠⠞⠉⠙⠲⡀⠀
//⠀⠀⠀⣴⠿⠏⠀⠀⠀⠀ ⠀⢳⡀⠀ ⡏⠀⠀⠀⠀⠀ ⢷
//⠀⠀⢠⣟⣋⡀⢀⣀⣀⡀⠀⣀⡀⣧⠀⢸⠀MY⠀   ⡇            Dat Nguyen
//⠀⠀⢸⣯⡭⠁⠸⣛⣟⠆⡴⣻⡲⣿⠀⣸⠀⠀  ⠀ ⡇
//⠀⠀⣟⣿⡭⠀⠀⠀⠀⠀⢱⠀ ⣿⠀⢹⠀ LOCAL ⡇            If you want to learn more about project details, please contact me via: nguyenphudat.haui@gmail.com
//⠀⠀⠙⢿⣯⠄⠀⠀⠀⢀⡀⠀⠀⡿⠀⠀⡇⠀⠀⠀⠀ ⡼             or facebook: https://www.facebook.com/npd6120
//⠀⠀⠀⠀⠹⣶⠆⠀⠀⠀⠀⠀⡴⠃⠀⠀⠘⠤⣄⣠⠞⠀
//⠀⠀⠀⠀⠀⢸⣷⡦⢤⡤⢤⣞⣁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀             
//⠀⠀⢀⣤⣴⣿⣏⠁⠀⠀⠸⣏⢯⣷⣖⣦⡀⠀⠀⠀⠀⠀⠀
//⢀⣾⣽⣿⣿⣿⣿⠛⢲⣶⣾⢉⡷⣿⣿⠵⣿⠀⠀⠀⠀⠀⠀           
//⣼⣿⠍⠉⣿⡭⠉⠙⢺⣇⣼⡏⠀⠀⠀⣄⢸⠀⠀⠀⠀⠀⠀
//⣿⣿⣧⣀⣿………⣀⣰⣏⣘⣆⣀⠀⠀⠀⠀
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
//Cau hinh chan============================tuy vao phan cung ma tu cau hinh
int pin1 = 2;
int pin2 = 0;
int pin3 = 9;
int pin4 = 13;
int sopin, trangthai;
//khai bao wifi, host, api key: kieu char*
const char* ssid = "Hello kitty 1";
const char* password = "19091977";
const char* host = "ezroom.000webhostapp.com"; //host thi bo http
const char* servername = "http://ezroom.000webhostapp.com/data.txt"; // cho them http
const char* api_key_gui_len = "dfgsfsjgh"; //random cai nay, muc dich la de phan biet gui va nhan, luc can luc khong


void setup() {
  pinMode(pin1, OUTPUT);
  pinMode(pin2, OUTPUT);
  pinMode(pin3, OUTPUT);
  pinMode(pin4, OUTPUT);
  Serial.begin(19200);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
    }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}
//========het setup=============================
int led1, oldled1;
int led2, oldled2;
int led3, oldled3;
int led4, oldled4;
void ttht() { //đọc trạng thái hiện tại của các GPIO moi, so sanh voi GPIO cu, neu khác thì mới gửi request lên sever, không thì thôi
    oldled1 = led1;
    oldled2 = led2;
    oldled3 = led3;
    oldled4 = led4;
//    led1 = random(0,2);
//    led2 = random(0,2);
//    led3 = random(0,2); 
//    led4 = random(0,2);
    led1 = digitalRead(pin1);
    led2 = digitalRead(pin2);
    led3 = digitalRead(pin3); 
    led4 = digitalRead(pin4);
  }

void dk(){
   Serial.print(sopin); Serial.print(trangthai);
   if(sopin == 1+48){
      digitalWrite(pin1, trangthai-48);
    }
   if(sopin == 2+48){
      digitalWrite(pin2, trangthai-48);
    }
   if(sopin == 3+48){
      digitalWrite(pin3, trangthai-48);
    }
   if(sopin == 4+48){
      digitalWrite(pin4, trangthai-48);
    }
  }
void loop() {
  dk();
  Serial.println("//////////////////////BEGIN//////////////////////");
  ttht();
  Serial.print("Trang thai GPIO: ");
  Serial.print(led1);
  Serial.print(led2);
  Serial.print(led3);
  Serial.println(led4);
  Serial.print("Connecting to: ");
  Serial.println(host);
  
  //1. Tao ket noi TCP su dung thu vien WiFiClient 
  WiFiClient client;
  HTTPClient http;
  const int httpPort = 80; //thuong la 80 voi http
  //kiem tra ket noi
  if (!client.connect(host, httpPort)) {
      Serial.println("Connection failed!");
      return;
    }
  Serial.println("Connection success!");
  //=============1. Gui request len PHP// Gui data len server=============
  if(led1 != oldled1 || led2 != oldled2 ||led3 != oldled3 ||led4 != oldled4){
    client.print(String("GET http://ezroom.000webhostapp.com/connect.php?")
                    +("&led1=") + led1
                    +("&led2=") + led2
                    +("&led3=") + led3
                    +("&led4=") + led4
                    + " HTTP/1.1\r\n"
                    + "Host: " + host + "\r\n"
                    + "Connection: close\r\n\r\n");
    unsigned long current_time = millis();
    while (client.available() == 0) {
      if (millis() - current_time > 2000) {
          Serial.print(">>> Client stop");
          client.stop();
          return;
        }
    }
 }
 
//  //=============1. Gui request len PHP// Gui data Temp- Humid len server=============
//  client.print(String("GET http://192.168.1.105/ezroom/connect.php?")
//                    +("&led1=") + led1
//                    +("&led2=") + led2
//                    +("&led3=") + led3
//                    + " HTTP/1.1\r\n"
//                    + "Host: " + host + "\r\n"
//                    + "Connection: close\r\n\r\n");
//  unsigned long current_time = millis();
//  while (client.available() == 0) {
//      if (millis() - current_time > 2000) {
//          Serial.print(">>> Client stop");
//          client.stop();
//          return;
//        }
//    }
////  Doc phan hoi (Dung de check) 
//  while (client.available()) {
//      String line = client.readStringUntil('\r');
//      Serial.print(line);
//    }
//  Serial.println("*******Da gui du lieu len server*******");
//  Serial.println();
//  Serial.println(); 
  //=============2. Doc lenh tu sever=============
  //=============Doc lenh tu data.txt=============
  http.begin(client, servername);
  int httpcode = http.GET();
  if (httpcode = 200) {
      Serial.print("Lenh tu sever gui ve: ");
      String payload = http.getString();
      Serial.println(payload);
      char a[100] = "";
      //toCharArray() biến đổi từ một bộ đệm string về mảng char array
      for (int i =1; i<= payload.length()+1; i++) {
        payload.toCharArray(a,i);
      }
      Serial.println("\n");
      Serial.print("Kí tự thứ 0: ");
      Serial.println(a[0]); 
      Serial.print("Kí tự thứ 1: ");
      Serial.println(a[1]);  
      sopin = a[0];
      trangthai = a[1]; 
    }
    client.stop();
//  unsigned long current_time2 = millis();
//  while (client.available() == 0) {
//      if (millis() - current_time2 > 2000) {
//          Serial.println(">>> Xong!");
//          Serial.println();
//          Serial.println();
//          client.stop();
//          return;
//        }
//    }
}

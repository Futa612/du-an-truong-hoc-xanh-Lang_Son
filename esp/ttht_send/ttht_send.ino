//⠀⠀⠀⠀⣠⣶⡾⠏⠉⠙⠳⢦⡀⠀⠀⠀⢠⠞⠉⠙⠲⡀⠀
//⠀⠀⠀⣴⠿⠏⠀⠀⠀⠀ ⠀⢳⡀⠀ ⡏⠀⠀⠀⠀⠀ ⢷
//⠀⠀⢠⣟⣋⡀⢀⣀⣀⡀⠀⣀⡀⣧⠀⢸⠀MY⠀   ⡇            
//⠀⠀⢸⣯⡭⠁⠸⣛⣟⠆⡴⣻⡲⣿⠀⣸⠀⠀  ⠀ ⡇
//⠀⠀⣟⣿⡭⠀⠀⠀⠀⠀⢱⠀ ⣿⠀⢹⠀ ONLINE⡇            
//⠀⠀⠙⢿⣯⠄⠀⠀⠀⢀⡀⠀⠀⡿⠀⠀⡇⠀⠀⠀⠀ ⡼             https://github.com/Futa612
//⠀⠀⠀⠀⠹⣶⠆⠀⠀⠀⠀⠀⡴⠃⠀⠀⠘⠤⣄⣠⠞⠀
//⠀⠀⠀⠀⠀⢸⣷⡦⢤⡤⢤⣞⣁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀             
//⠀⠀⢀⣤⣴⣿⣏⠁⠀⠀⠸⣏⢯⣷⣖⣦⡀⠀⠀⠀⠀⠀⠀
//⢀⣾⣽⣿⣿⣿⣿⠛⢲⣶⣾⢉⡷⣿⣿⠵⣿⠀⠀⠀⠀⠀⠀           
//⣼⣿⠍⠉⣿⡭⠉⠙⢺⣇⣼⡏⠀⠀⠀⣄⢸⠀⠀⠀⠀⠀⠀
//⣿⣿⣧⣀⣿………⣀⣰⣏⣘⣆⣀⠀⠀⠀⠀
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <DNSServer.h>
#include <ESP8266WebServer.h>
#include <WiFiManager.h>         // https://github.com/tzapu/WiFiManager
//Cau hinh chan===========================
int pin1 = D1;
int pin2 = D2;
int pin3 = D3;
int pin4 = D4;

int button1 = D5;
int button2 = D6;
int button3 = D7;
int button4 = D8;

int sopin, trangthai,sopin_cu, trangthai_cu;

String old_payload;

// Set web server port number to 80
WiFiServer server(80);

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

  pinMode(button1, INPUT);
  pinMode(button2, INPUT);
  pinMode(button3, INPUT);
  pinMode(button4, INPUT);
  
  Serial.begin(115200);
  WiFiManager wifiManager;
  wifiManager.autoConnect("EasyRoom");
  Serial.println("Connected.");
  server.begin();
}
//========het setup=============================
int led1, oldled1;
int led2, oldled2;
int led3, oldled3;
int led4, oldled4;
int cmd;
void ttht() { //đọc trạng thái hiện tại của các GPIO moi, so sanh voi GPIO cu, neu khác thì mới gửi request lên sever
    oldled1 = led1;
    oldled2 = led2;
    oldled3 = led3;
    oldled4 = led4;
    
    led1 = digitalRead(pin1);
    led2 = digitalRead(pin2);
    led3 = digitalRead(pin3); 
    led4 = digitalRead(pin4);
  }

void dk(){
//   Serial.print(sopin); Serial.print(trangthai);
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
void dk2(){
  if (digitalRead(button4) == 1) { 
    digitalWrite(pin4,1);   
  }
  else digitalWrite(pin4,0); 
} 
void gui_request() {
  //  Serial.println("//////////////////////BEGIN//////////////////////");
  if(led1 != oldled1 || led2 != oldled2 ||led3 != oldled3 ||led4 != oldled4){
    //1. Tao ket noi TCP su dung thu vien WiFiClient 
  WiFiClient client;
  HTTPClient http;
  const int httpPort = 80; //thuong la 80 voi http
  //kiem tra ket noi
  if (!client.connect(host, httpPort)) {
//      Serial.println("Connection failed!");
      return;
    }
//  Serial.println("Connection success!");
  //=============1. Gui request len PHP// Gui data len server=============
    client.print(String("GET http://ezroom.000webhostapp.com/connect.php?")
                    +("&led1=") + led1
                    +("&led2=") + led2
                    +("&led3=") + led3
                    +("&led4=") + led4
                    +("&cmd=") + cmd
                    + " HTTP/1.1\r\n"
                    + "Host: " + host + "\r\n"
                    + "Connection: close\r\n\r\n");
    unsigned long current_time = millis();
    while (client.available() == 0) {
      if (millis() - current_time > 2000) {
//          Serial.print(">>> Client stop");
          client.stop();
          return;
        }
    }
  }
}
void nhan_request(){
  //=============2. Doc lenh tu sever=============
//=============Doc lenh tu data.txt=============
  WiFiClient client;
  HTTPClient http;
  const int httpPort = 80; //thuong la 80 voi http
  //kiem tra ket noi
  if (!client.connect(host, httpPort)) {
//      Serial.println("Connection failed!");
      return;
    }
  http.begin(client, servername);
  int httpcode = http.GET();
  if (httpcode = 200) {
//      Serial.print("Lenh tu sever gui ve: ");
      String payload = http.getString();
//      Serial.println(payload);
      char a[100] = "";
      //toCharArray() biến đổi từ một bộ đệm string về mảng char array
      for (int i =1; i<= payload.length()+1; i++) {
        payload.toCharArray(a,i);
      }
      if(payload =! old_payload) {
        sopin = a[0];
        trangthai = a[1]; 
        }  
    }
    client.stop();
}
void gui_ndda(){
  //  //=============1. Gui request len PHP// Gui data Temp- Humid len server=============
  WiFiClient client;
  HTTPClient http;
  client.print(String("GET http://192.168.1.105/ezroom/connect.php?")
                    +("&led1=") + led1
                    +("&led2=") + led2
                    +("&led3=") + led3
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
//  Doc phan hoi (Dung de check) 
  while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
  Serial.println("*******Da gui du lieu len server*******");
  Serial.println();
  Serial.println(); 
  }
  
void loop() {
    dk();
    dk2();
    ttht();
    gui_request();
    nhan_request();
}

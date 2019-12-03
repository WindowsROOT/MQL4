double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "2bbcc91754015ef9be9cf7e__";
bool Open_Buy(){
 if( iATR(NULL,PERIOD_M15,14,1) > iMA(NULL,PERIOD_M15,21,0,MODE_SMA,PRICE_CLOSE,1) ) { 
 return 1; 
 } else 
return 0; }
bool Open_Sell(){
return 0; }
bool Close_Buy(){
return 0; }
bool Close_Sell(){
return 0; }
bool Option(){
TP = 300;
SL = 300;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
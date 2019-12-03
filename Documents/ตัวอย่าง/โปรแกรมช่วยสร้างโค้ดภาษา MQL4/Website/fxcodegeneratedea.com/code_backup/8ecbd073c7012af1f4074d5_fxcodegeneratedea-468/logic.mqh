double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "8ecbd073c7012af1f4074d5_fxcodegeneratedea-468_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M1,5,0,MODE_SMA,PRICE_CLOSE,1) > iMA(NULL,PERIOD_M1,12,0,MODE_SMA,PRICE_CLOSE,1) ) { 
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
TP = 400;
SL = 300;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
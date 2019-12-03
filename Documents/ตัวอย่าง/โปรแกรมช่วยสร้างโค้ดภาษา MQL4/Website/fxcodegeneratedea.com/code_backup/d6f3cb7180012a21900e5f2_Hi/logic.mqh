double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "d6f3cb7180012a21900e5f2_Hi_";
bool Open_Buy(){
 if( iClose(NULL,PERIOD_M1,1) > iOsMA(NULL,PERIOD_M1,1,1,1,PRICE_CLOSE,1) ) { 
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
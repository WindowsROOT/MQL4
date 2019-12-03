double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "356301e27d023f9e7a6b7e7_wtf pro_";
bool Open_Buy(){
 if( iMACD(NULL,PERIOD_M5,3,1,3,PRICE_CLOSE,MODE_MAIN,1) > iRSI(NULL,PERIOD_M1,5,PRICE_CLOSE,1) ) { 
 return 1; 
 } else 
return 0; }
bool Open_Sell(){
return 0; }
bool Close_Buy(){
 if(  ) { 
 return 1; 
} else 
return 0; }
bool Close_Sell(){
return 0; }
bool Option(){
TP = 200;
SL = 500;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
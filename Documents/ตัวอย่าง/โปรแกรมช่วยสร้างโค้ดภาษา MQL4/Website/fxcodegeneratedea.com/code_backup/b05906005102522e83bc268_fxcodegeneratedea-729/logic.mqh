double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "b05906005102522e83bc268_fxcodegeneratedea-729_";
bool Open_Buy(){
 if( iStdDev(NULL,PERIOD_M1,20,0,MODE_SMA,PRICE_CLOSE,1) > iMomentum(NULL,PERIOD_M1,14,PRICE_CLOSE,1) ) { 
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
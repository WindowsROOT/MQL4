double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "c95d1258280125c5eba3e29__";
bool Open_Buy(){
 if( iEnvelopes(NULL,PERIOD_M15,14,MODE_SMA,0,PRICE_CLOSE,0.10,MODE_UPPER,1) > iIchimoku(NULL,PERIOD_M15,9,26,52,MODE_TENKANSEN,1) ) { 
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
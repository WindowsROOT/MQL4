double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "3a55b5cf170126c6bd3483f_fxcodegeneratedea-854_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M1,10,0,MODE_SMA,PRICE_CLOSE,1) > iMA(NULL,PERIOD_M1,20,0,MODE_SMA,PRICE_CLOSE,1) ) { 
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
TP = 600;
SL = 400;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "ae7e2da08901287dee79024__";
bool Open_Buy(){
 if( iStdDev(NULL,PERIOD_M15,20,0,MODE_SMA,PRICE_CLOSE,1) > iStochastic(NULL,PERIOD_M15,5,3,3,MODE_SMA,0,MODE_MAIN,1) ) { 
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
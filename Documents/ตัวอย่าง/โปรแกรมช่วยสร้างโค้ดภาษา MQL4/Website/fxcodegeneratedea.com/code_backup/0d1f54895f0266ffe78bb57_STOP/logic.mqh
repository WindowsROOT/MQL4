double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "0d1f54895f0266ffe78bb57_STOP_";
bool Open_Buy(){
return 0; }
bool Open_Sell(){
 if( iClose(NULL,PERIOD_M1,1) > iStdDev(NULL,PERIOD_M1,20,0,MODE_SMA,PRICE_CLOSE,1) ) { 
 return 1; 
 } else 
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
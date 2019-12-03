double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "17c8ff4af5016be13c346f1_test_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M5,1,1,MODE_EMA,PRICE_OPEN,1) <= iMACD(NULL,PERIOD_M15,5,4,3,PRICE_OPEN,MODE_MAIN,21) ) { 
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
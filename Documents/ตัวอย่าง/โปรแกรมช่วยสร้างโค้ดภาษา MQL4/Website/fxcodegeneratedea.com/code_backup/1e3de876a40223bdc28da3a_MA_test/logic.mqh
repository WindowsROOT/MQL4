double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "1e3de876a40223bdc28da3a_MA_test_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M1,12,0,MODE_SMA,PRICE_CLOSE,1) > iMA(NULL,PERIOD_M1,36,0,MODE_SMA,PRICE_CLOSE,1) ) { 
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
SL = 200;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
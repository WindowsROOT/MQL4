double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "90e5427f610225fb22b069b_MA_CROSS_";
bool Open_Buy(){
 if( iStochastic(NULL,PERIOD_M1,5,3,3,MODE_SMA,0,MODE_MAIN,1) > iMomentum(NULL,PERIOD_M1,14,PRICE_CLOSE,1) ) { 
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
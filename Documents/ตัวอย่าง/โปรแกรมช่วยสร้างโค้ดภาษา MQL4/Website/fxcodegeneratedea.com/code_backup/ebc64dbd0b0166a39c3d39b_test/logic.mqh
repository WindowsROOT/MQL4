double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "ebc64dbd0b0166a39c3d39b_test_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M1,1,1,MODE_SMA,PRICE_CLOSE,1) <= iMACD(NULL,0,5,4,3,PRICE_MEDIAN,--Select--,21) ) { 
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
double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "47228a1b6a015721a2d18c2_test01_";
bool Open_Buy(){
 if( iMACD(NULL,PERIOD_M1,1,1,1,PRICE_CLOSE,MODE_MAIN,1) > iClose(NULL,PERIOD_M1,1) ) { 
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
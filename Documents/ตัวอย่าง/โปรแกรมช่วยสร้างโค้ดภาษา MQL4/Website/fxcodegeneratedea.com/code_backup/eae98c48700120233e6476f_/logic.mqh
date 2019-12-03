double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "eae98c48700120233e6476f__";
bool Open_Buy(){
 if( iBands(NULL,PERIOD_M15,20,2,0,PRICE_CLOSE,MODE_MAIN,1) > iCCI(NULL,PERIOD_M15,14,PRICE_CLOSE,1) ) { 
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
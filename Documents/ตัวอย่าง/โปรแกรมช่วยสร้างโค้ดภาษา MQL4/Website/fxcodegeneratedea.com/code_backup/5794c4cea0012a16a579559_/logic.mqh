double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "5794c4cea0012a16a579559__";
bool Open_Buy(){
 if( iRSI(NULL,PERIOD_M15,14,PRICE_CLOSE,1) > iSAR(NULL,PERIOD_M15,0.02,0.2,1) ) { 
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
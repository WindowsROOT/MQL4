double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "aebee3cbd5012694d638a0e_fxcodegeneratedea-979_";
bool Open_Buy(){
 if( iSAR(NULL,PERIOD_M1,0.02,0.2,1) > iClose(NULL,PERIOD_M1,1) ) { 
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
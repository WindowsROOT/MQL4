double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "47aa40506d02223ea6d2fcc_MA-Cross_";
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
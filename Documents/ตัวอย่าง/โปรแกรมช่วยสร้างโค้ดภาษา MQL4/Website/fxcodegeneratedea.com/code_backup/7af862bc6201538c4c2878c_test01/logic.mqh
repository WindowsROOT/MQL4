double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "7af862bc6201538c4c2878c_test01_";
bool Open_Buy(){
 if( iMACD(NULL,0,,,,--Select--,--Select--,) > iClose(NULL,PERIOD_M1,1) ) { 
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
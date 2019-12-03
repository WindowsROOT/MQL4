double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "b6b5342e76012d193a0b6d8_fxcodegeneratedea_604_";
bool Open_Buy(){
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
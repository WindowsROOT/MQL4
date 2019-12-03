double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "756541755a0375a8301be3c_fxcodegeneratedea-589_";
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
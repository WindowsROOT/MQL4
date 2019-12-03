double TP;
double SL;
double Lots;
double Magic = 111111;
string ea_name = "296c7a76e2012542df5dc19_ADX_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M15,12,0,MODE_EMA,PRICE_CLOSE,1) > iMA(NULL,PERIOD_M1,36,10,MODE_EMA,PRICE_CLOSE,1)   &&   
iMA(NULL,PERIOD_M15,12,0,MODE_EMA,PRICE_CLOSE,1) <= iLow(NULL,PERIOD_M15,1) ) { 
 return 1; 
 } else 
return 0; }
bool Open_Sell(){
return 0; }
bool Close_Buy(){
 if( iADX(NULL,PERIOD_M15,14,PRICE_CLOSE,MODE_MAIN,1) > 40   &&   
iADX(NULL,PERIOD_M15,14,PRICE_CLOSE,MODE_MAIN,2) > iADX(NULL,PERIOD_M15,14,PRICE_CLOSE,MODE_MAIN,1) ) { 
 return 1; 
} else 
return 0; }
bool Close_Sell(){
return 0; }
bool Option(){
TP = 450;
SL = 300;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
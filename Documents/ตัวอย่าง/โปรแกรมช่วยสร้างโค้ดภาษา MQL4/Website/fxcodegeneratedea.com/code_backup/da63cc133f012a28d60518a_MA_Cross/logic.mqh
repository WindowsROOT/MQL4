double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "da63cc133f012a28d60518a_MA_Cross_";
bool Open_Buy(){
 if( iMA(NULL,PERIOD_M15,20,0,MODE_EMA,PRICE_CLOSE,1) > iMA(NULL,PERIOD_M15,100,0,MODE_EMA,PRICE_CLOSE,1)   &&   
iClose(NULL,PERIOD_M15,1) > iMA(NULL,PERIOD_M15,20,0,MODE_EMA,PRICE_CLOSE,1) ) { 
 return 1; 
 } else 
return 0; }
bool Open_Sell(){
return 0; }
bool Close_Buy(){
 if( iMA(NULL,PERIOD_M15,20,0,MODE_EMA,PRICE_CLOSE,1) < iMA(NULL,PERIOD_M1,100,0,MODE_EMA,PRICE_CLOSE,1) ) { 
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
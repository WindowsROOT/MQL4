double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "97de5341fd0224e4c7b007b_fxcodegeneratedea_347_";
bool Open_Buy(){
 if( iATR(NULL,PERIOD_M1,14,1) > iMA(NULL,PERIOD_M1,12,0,MODE_SMA,PRICE_CLOSE,1) ) { 
 return 1; 
 } else 
return 0; }
bool Open_Sell(){
 if( iSAR(NULL,PERIOD_M1,0.02,0.2,1) > iRSI(NULL,PERIOD_M1,14,PRICE_CLOSE,1) ) { 
 return 1; 
 } else 
return 0; }
bool Close_Buy(){
 if( iStdDev(NULL,PERIOD_M1,20,0,MODE_SMA,PRICE_CLOSE,1) > iADX(NULL,PERIOD_M1,14,PRICE_CLOSE,MODE_MAIN,1) ) { 
 return 1; 
} else 
return 0; }
bool Close_Sell(){
 if( iLow(NULL,PERIOD_M1,1) > iSAR(NULL,PERIOD_M1,0.02,0.2,1) ) { 
 return 1; 
} else 
return 0; }
bool Option(){
TP = 300;
SL = 300;
Lots = 0.01;
if( TP != 0 ){
return 1;
}else return 0;
}
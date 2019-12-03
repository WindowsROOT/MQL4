double TP;
double SL;
double Lots;
double Magic = 123456;
string ea_name = "17d6fbc4b0015a9b6728c14_arm02_";
bool Open_Buy(){
 if( iADX(NULL,PERIOD_M1,1,PRICE_CLOSE,MODE_MAIN,1) > iATR(NULL,PERIOD_M1,1,1)   &&   
iBands(NULL,PERIOD_M1,2,2,2,PRICE_CLOSE,MODE_MAIN,2) < iCCI(NULL,PERIOD_M1,2,PRICE_CLOSE,2)   ||   
iEnvelopes(NULL,PERIOD_M1,3,MODE_SMA,3,PRICE_CLOSE,3,MODE_UPPER,3) > iIchimoku(NULL,PERIOD_M1,3,3,3,MODE_TENKANSEN,3)   &&   
iMA(NULL,PERIOD_M1,1,1,MODE_SMA,PRICE_CLOSE,1) < iMACD(NULL,0,,,,--Select--,--Select--,) ) { 
 return 1; 
 } else 
return 0; }
bool Open_Sell(){
 if( iMomentum(NULL,PERIOD_M1,4,PRICE_CLOSE,4) > iOsMA(NULL,PERIOD_M1,4,4,4,PRICE_CLOSE,4)   &&   
iRSI(NULL,PERIOD_M1,5,PRICE_CLOSE,5) < iSAR(NULL,PERIOD_M1,5,5,5)   ||   
iStdDev(NULL,PERIOD_M1,6,6,MODE_SMA,PRICE_CLOSE,6) > iStochastic(NULL,PERIOD_M1,6,6,6,MODE_SMA,0,MODE_MAIN,6) ) { 
 return 1; 
 } else 
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
//+------------------------------------------------------------------+
//|                                                          MTC.mq5 |
//|                        Copyright 2020, MetaQuotes Software Corp. |
//|                                             https://www.mql5.com |
//+------------------------------------------------------------------+
#property copyright "WindowsROOT."
#property link      "https://www.facebook.com/WindowsROOT"
#property version   "1.00"
#include <trade\Trade.mqh>
#include <Trade\SymbolInfo.mqh>
double  Point();

CTrade trade;
//+------------------------------------------------------------------+
//| External parameters                        |
//+------------------------------------------------------------------+
input string	Symbol_1	= "EURUSD";
input string	Symbol_2	= "GBPUSD";
input string	Symbol_3	= "USDCHF";
input double	lot_1		= 0.01;	
input double	lot_2		= 0.02;	
input double	lot_3		= 0.03;	
input double   TP       =800;
input double   SL       =300;





//+------------------------------------------------------------------+
//| Expert initialization function                                   |
//+------------------------------------------------------------------+
int OnInit()
  {
//---
  //BUY();
  SELL();

//---
   return(INIT_SUCCEEDED);
  }
//+------------------------------------------------------------------+
//| Expert deinitialization function                                 |
//+------------------------------------------------------------------+
void OnDeinit(const int reason)
  {
//---
   
  }
//+------------------------------------------------------------------+
//| Expert tick function                                             |
//+------------------------------------------------------------------+
void OnTick()
  {
//---
   
  }
//+------------------------------------------------------------------+


void BUY (){
trade.Buy( lot_1,
   			  Symbol_1,
   		     NULL,
   			  SymbolInfoDouble(Symbol_1,SYMBOL_ASK)-SL*_Point, 
   			  SymbolInfoDouble(Symbol_1,SYMBOL_ASK)+TP*_Point,
   			  NULL 		//comment
   			 );
   trade.Buy( lot_2,
   			  Symbol_2,
   		     NULL,
   			  SymbolInfoDouble(Symbol_2,SYMBOL_ASK)-SL*_Point, 
   			  SymbolInfoDouble(Symbol_2,SYMBOL_ASK)+TP*_Point,
   			  NULL 		//comment
   			 );
   trade.Buy( lot_3,
   			  Symbol_3,
   		     NULL,
   			  SymbolInfoDouble(Symbol_3,SYMBOL_ASK)-SL*_Point, 
   			  SymbolInfoDouble(Symbol_3,SYMBOL_ASK)+TP*_Point,
   			  NULL 		//comment
   			 );

}

void SELL (){
   trade.Sell( lot_1,
   			  Symbol_1,
   		     NULL,
   			  SymbolInfoDouble(Symbol_1,SYMBOL_ASK)+SL*_Point, 
   			  SymbolInfoDouble(Symbol_1,SYMBOL_ASK)-TP*_Point,
   			  NULL 		//comment
   			 );
   trade.Sell( lot_2,
   			  Symbol_2,
   		     NULL,
   			  SymbolInfoDouble(Symbol_2,SYMBOL_ASK)+SL*_Point, 
   			  SymbolInfoDouble(Symbol_2,SYMBOL_ASK)-TP*_Point,
   			  NULL 		//comment
   			 );
   trade.Sell( lot_3,
   			  Symbol_3,
   		     NULL,
   			  SymbolInfoDouble(Symbol_3,SYMBOL_ASK)+SL*_Point, 
   			  SymbolInfoDouble(Symbol_3,SYMBOL_ASK)-TP*_Point,
   			  NULL 		//comment
   			 );

}








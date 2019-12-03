//+------------------------------------------------------------------+
//|                                                          MM2.mq4 |
//|                        Copyright 2017, MetaQuotes Software Corp. |
//|                                             https://www.mql5.com |
//+------------------------------------------------------------------+
#property copyright "Copyright 2017, MetaQuotes Software Corp."
#property link      "https://www.mql5.com"
#property version   "1.00"
#property strict

#include <logic.mqh>
input bool ForwardTest = true;
//double Magic = 111111;
int Layer = 0;
short Buy = 0;
short Sell = 0;
double total = 0;
double Buffer = 0;
double Arr_Loss[5] = {0,0,0,0,0};
double Money = 0;
double stoploss = 0;
double takeprofit = 0;
string Status = "";
double CheckOrders = 0;
short Stat_Close_Pos = 0;
double NumWin = 0;
bool handle;
string Arr_Date[3];
int days = 0;//check days BlackTest
string Days; // Check Days
string str; //name of files
double LastMoney = 0;
int LastPosition = 0;
string comment;
string hour = "";
//========================================================================================
#define INTERNET_SERVICE_FTP    1
#define INTERNET_SERVICE_GOPHER 2
#define INTERNET_SERVICE_HTTP   3

#define FTP_TRANSFER_TYPE_UNKNOWN   0x00000000
#define FTP_TRANSFER_TYPE_ASCII     0x00000001
#define FTP_TRANSFER_TYPE_BINARY    0x00000002


#import "wininet.dll"
   int InternetOpenW(string Agent, int AccessType, string ProxyName, string ProxyBypass, int Flags);
   int InternetConnectW(int hInternetSession, string ServerName, int ServerPort, string UserName, string Password, int Service, int Flags, int Context);
   bool FtpPutFileW(int hFtpSession, string LocalFile, string RemoteFile, int Flags, int Context);
   bool FtpGetFileW(int hFtpSession, string lpszRemoteFile, string lpszNewFile, bool fFailIfExists, int dwLocalFlagsAttribute, int dwInternetFlags, int dwContext);
   bool InternetCloseHandle(int hInet);
#import

//=========================================================================================
void DownLoadUploadFile()
{

   if( ForwardTest == true )
   {
      int hIntObj, hIntObjConn;
      string Password, ServerName, UserName;
      bool success = false;
   
   //Uploading the file
      hIntObj=InternetOpenW("MyInternetObject",1, NULL,NULL,0);
   
      //printf("internet object %d", hIntObj);
   
      if (hIntObj>0)
      {
         ServerName="gator4148.hostgator.com";
         
         UserName="vertical@doujin69-th.com";//Your username for a ftp session
         Password="y4nlfwtkCz#H";//Your password for a ftp session
         
         hIntObjConn=InternetConnectW(hIntObj, ServerName, 21, UserName, Password, INTERNET_SERVICE_FTP, 0, 0); 

         
         if (hIntObjConn>0)
         {
             printf("Successfully connected. %d", hIntObjConn);
             Check_Time();
             FileDatetime();
             //handle=FileOpen( ea_name+str+".csv" ,FILE_CSV|FILE_READ|FILE_WRITE,',');
             if( Days != Arr_Date[2] )
             {
               handle=FileOpen( ea_name+str+".csv" ,FILE_CSV|FILE_READ|FILE_WRITE,',');
             printf("Day %s != Arr_Days %s",Days,Arr_Date[2]);
               FileWrite(handle, 
                        "Time", "Money", "Balance", "Position", "Buy", "Sell", "StatWin", "Buffer", "Layer1", "Layer2", "Layer3", "Layer4", "\n"
                        +TimeToStr(TimeLocal(),TIME_SECONDS), DoubleToStr(Money,2), DoubleToStr(AccountBalance(),2), DoubleToStr(total,0), DoubleToStr(Buy,0), DoubleToStr(Sell,0), DoubleToStr(NumWin,0), DoubleToStr(Buffer,2),  
                         DoubleToStr(Arr_Loss[1],2), DoubleToStr(Arr_Loss[2],2), DoubleToStr(Arr_Loss[3],2), DoubleToStr(Arr_Loss[4],2)
                      );
               FileClose(handle);
               string LocalFile=TerminalInfoString(TERMINAL_DATA_PATH) + "\\MQL4\\Files\\"+ea_name+str +".csv";
               string HostFile= ea_name+str+".csv";
               success=FtpPutFileW(hIntObjConn, LocalFile, HostFile, FTP_TRANSFER_TYPE_BINARY, NULL);
               if( Minute() == 0 )
               {
                  string HostFile= ea_name+str+".csv";
                  success=FtpPutFileW(hIntObjConn, LocalFile, HostFile, FTP_TRANSFER_TYPE_BINARY, NULL);
               }
               FileDatetime();
             }
             else if ( Days == Arr_Date[2] && hour != "0")
             {
             printf("Day %s == Arr_Date %s && hour %s",Days,Arr_Date[2],hour);
               if( Minute() == 30  || Minute() == 0 )
               {
               printf("Minute = %d",Minute());
                  handle=FileOpen( ea_name+str+".csv" ,FILE_CSV|FILE_READ|FILE_WRITE,',');
                  if(FileSeek(handle, 0,SEEK_END)==true)//Check Line
                  {
                  printf("FileSeek");
                     FileWrite(handle,
                        TimeToStr(TimeLocal(),TIME_SECONDS), DoubleToStr(Money,2), DoubleToStr(AccountBalance(),2), DoubleToStr(total,0), DoubleToStr(Buy,0), DoubleToStr(Sell,0), DoubleToStr(NumWin,0), DoubleToStr(Buffer,2),  
                        DoubleToStr(Arr_Loss[1],2), DoubleToStr(Arr_Loss[2],2), DoubleToStr(Arr_Loss[3],2), DoubleToStr(Arr_Loss[4],2)
                     );
                     FileClose(handle);
                     string LocalFile=TerminalInfoString(TERMINAL_DATA_PATH) + "\\MQL4\\Files\\"+ea_name+str +".csv";
                     if( Minute() == 0 || Minute() == 30 )
                     {
                        string HostFile= ea_name+str +".csv";                 
                        success=FtpPutFileW(hIntObjConn, LocalFile, HostFile, FTP_TRANSFER_TYPE_BINARY, NULL);
                     }
                   }
                 }
               
               FileDatetime();  
             }    
            }
            else
            {
               //printf("login failed. %d", hIntObjConn);
            }
         }
         InternetCloseHandle(hIntObj);
   
         if (success == false)
         {
              printf("Downloading/Uploading error. %d", success);
    
         }
         else
         {
              printf("Downloading/Uploading sucessfull!!");
              Days = Arr_Date[2];
         }
   }
   else
   {
      handle=FileOpen( ea_name+str+".csv" ,FILE_CSV|FILE_READ|FILE_WRITE,',');
      Check_Time();
      FileDatetime();
      if( Days != Arr_Date[2])
      {
             
         FileWrite(handle, 
            "Time", "Money", "Balance", "Position", "Buy", "Sell", "StatWin", "Buffer", "Layer1", "Layer2", "Layer3", "Layer4", "\n"
            +TimeToStr(TimeLocal(),TIME_SECONDS), DoubleToStr(Money,2), DoubleToStr(AccountBalance(),2), DoubleToStr(total,0), DoubleToStr(Buy,0), DoubleToStr(Sell,0), DoubleToStr(NumWin,0), DoubleToStr(Buffer,2),  
            DoubleToStr(Arr_Loss[1],2), DoubleToStr(Arr_Loss[2],2), DoubleToStr(Arr_Loss[3],2), DoubleToStr(Arr_Loss[4],2)
         );
         FileClose(handle);
         string LocalFile=TerminalInfoString(TERMINAL_DATA_PATH) + "\\tester\\files\\"+ea_name+str +".csv";
         FileDatetime();
         Days = Arr_Date[2];
       }
       else if ( Days == Arr_Date[2] && hour != "0" )
        {
             //printf("Day == Days");
               if( Minute() == 30  || Minute() == 0 )
               {
               //printf("Minute = %d",Minute());
                  handle=FileOpen( ea_name+str+".csv" ,FILE_CSV|FILE_READ|FILE_WRITE,',');
                  if(FileSeek(handle, 0,SEEK_END)==true)//Check Line
                  {
                  //printf("FileSeek");
                     FileWrite(handle,
                        TimeToStr(TimeLocal(),TIME_SECONDS), DoubleToStr(Money,2), DoubleToStr(AccountBalance(),2), DoubleToStr(total,0), DoubleToStr(Buy,0), DoubleToStr(Sell,0), DoubleToStr(NumWin,0), DoubleToStr(Buffer,2),  
                        DoubleToStr(Arr_Loss[1],2), DoubleToStr(Arr_Loss[2],2), DoubleToStr(Arr_Loss[3],2), DoubleToStr(Arr_Loss[4],2)
                     );
                     FileClose(handle);
                     string LocalFile=TerminalInfoString(TERMINAL_DATA_PATH) + "\\tester\\files\\"+ea_name+str +".csv";
                  }
               }
               
            FileDatetime();  
        }    
   }
}
//============================================================================================================
void FileDatetime()
{
 Arr_Date[0] = StringSubstr(TimeToStr( TimeLocal(),TIME_DATE ),0,4);//year
 Arr_Date[1] = StringSubstr(TimeToStr( TimeLocal(),TIME_DATE ),5,2);//month
 Arr_Date[2] = StringSubstr(TimeToStr( TimeLocal(),TIME_DATE ),8,2);//day
 str = Arr_Date[0] +Arr_Date[1] +Arr_Date[2];
 //printf("Days %d Arr_Date %s",Day(),Arr_Date[2]);
}
//============================================================================================================
void Check_Time()
{
 hour = StrToDouble(StringSubstr(TimeToStr( TimeLocal(),TIME_SECONDS ),0,2));
 //printf("Func_Time: %s",hour);
}
//============================================================================================================
void Open_Pos()
{
   printf("Open_Pos");
   if( Open_Buy() == 1 && Option() == 1)
   {
      if( OrderSend(Symbol(),OP_BUY,Lots,Ask,3,Ask-SL*Point,Ask+TP*Point,comment,Magic,0,clrGreen )) 
      {
         //printf("Comment: %s",comment);
         Status = "Open_Buy";
         Layer = Layer + 1;
         Buy = Buy + 1;
         total = total + 1;
         //DownLoadUploadFile();
      }//end if
      else printf("%d",GetLastError());
   }
   else if( Open_Buy() == 1 && Option() == 0 )
   {
      if( OrderSend(Symbol(),OP_BUY,Lots,Ask,3,Ask-SL*Point,0,comment,Magic,0,clrGreen))
      {
         //printf("Comment: %s",comment);
         Status = "Open_Buy NO TP";
         Layer = Layer + 1;
         Buy = Buy + 1;
         total = total + 1;
         //DownLoadUploadFile();
      }
      else printf("%d",GetLastError());
   }//end else if
   else if( Open_Sell() == 1 && Option() == 1)
   {
      if( OrderSend(Symbol(),OP_SELL,Lots,Bid,3,Bid+SL*Point,Bid-TP*Point,comment,Magic,0,clrRed))
      {
         Status = "Open_Sell";
         Layer = Layer + 1;
         Sell = Sell + 1;
         total = total + 1;
         //DownLoadUploadFile();
      }
      else printf("%d",GetLastError());
      
   }//end else if
   else if( Open_Sell() == 1 && Option() == 0)
   {
      if( OrderSend(Symbol(),OP_SELL,Lots,Bid,3,Ask+SL*Point,0,comment,Magic,0,clrRed))
      {
         Status = "Open_Sell NO TP";
         Layer = Layer + 1;
         Sell = Sell + 1;
         total = total + 1;
         //DownLoadUploadFile();
      }
      else printf("%d",GetLastError());
   }//end else if
   //printf("Status: %s",Status);
}
//===========================================================================================================
void Close_Pos()
{
   if( Close_Buy() == 1 && Option() == 0 )
   {
      Status = "Close_Buy";
      printf("Close_Buy");
      for( int i = 0; i < OrdersTotal(); i++ )
      {
         if( OrderSelect(i,SELECT_BY_POS,MODE_TRADES) == 1 )
         {
            if( OrderType() == OP_BUY && Bid > OrderOpenPrice() )
            {
              if ( OrderClose(OrderTicket(),Lots,Bid,3,clrAliceBlue) )
              {
                  Stat_Close_Pos = 1;
                  NumWin = NumWin + 1;
                  //DownLoadUploadFile();
              }
              else printf("%d",GetLastError());
            }
         }
      }
   }
   else if( Close_Buy() == 1 && Option() == 1 )
   {
      Status = "Close_Buy & Option";
      printf("Close_Buy & Option");
      for( int i = 0; i < OrdersTotal(); i++ )
      {
         if( OrderSelect(i,SELECT_BY_POS,MODE_TRADES) == 1 )
         {
            if( OrderType() == OP_BUY && Bid > OrderOpenPrice() )
            {
              if ( OrderClose(OrderTicket(),Lots,Bid,3,clrAliceBlue) )
              {
                  Stat_Close_Pos = 1;
                  NumWin = NumWin + 1;
                  //DownLoadUploadFile();
              }  
              else printf("%d",GetLastError());             
            }
         }
      }
   }
   else if( Close_Sell() == 1 && Option() == 0 )
   {
      Status = "Close_Sell";
      printf("Close_Sell");
      for( int i = 0; i < OrdersTotal(); i++ )
      {
         if( OrderSelect(i,SELECT_BY_POS,MODE_TRADES) == 1 )
         {
            if( OrderType() == OP_SELL && Ask < OrderOpenPrice() )
            {
              if ( OrderClose(OrderTicket(),Lots,Ask,3,clrAliceBlue) )
              {
                  Stat_Close_Pos = 1;
                  NumWin = NumWin + 1;
                  //DownLoadUploadFile();
              }
              else printf("%d",GetLastError());
               
            }
         }
      }
   }
   else if( Close_Sell() == 1 && Option() == 1 )
   {
      Status = "Close_Sell & Option";
      printf("Close_Sell & Option");
      for( int i = 0; i < OrdersTotal(); i++ )
      {
         if( OrderSelect(i,SELECT_BY_POS,MODE_TRADES) == 1 )
         {
            if( OrderType() == OP_SELL  && Ask < OrderOpenPrice())
            {
              if ( OrderClose(OrderTicket(),Lots,Ask,3,clrAliceBlue) )
              {
                  Stat_Close_Pos = 1;
                  NumWin = NumWin + 1;
                  //DownLoadUploadFile();
              }
              else printf("%d",GetLastError());
               
            }
         }
      }
   }
}
//==========================================================================
//double tick_value = MarketInfo(Symbol(),MODE_TICKVALUE); //lots * distance * tickvalue
void Cal_Layer()
{
   if( OrdersHistoryTotal() > 0 )
   {
      Status = "";
      int check = OrdersHistoryTotal() - 1;
         if( OrderSelect(check,SELECT_BY_POS,MODE_HISTORY) )
         {
            if( (AccountBalance() >= LastMoney && OrderMagicNumber() == Magic) || (Stat_Close_Pos == 1 && OrderMagicNumber() == Magic) )//Check TP 
            {
               takeprofit = OrderProfit() + OrderSwap() + OrderCommission();
               //printf("Buffer: %f",Buffer);
               //printf("takeprofit: %f",takeprofit);
               //printf("Arr_[%d]: %f",Layer-1,Arr_Loss[Layer-1]);
               if( Layer == 1 && Buffer >= 0 )
               {
                  printf("Layer = 1 & Buffer >= 0 [TP]");
                  printf("takeprofit: %f",takeprofit);
                  Buffer = Buffer + takeprofit;
                  Layer = Layer - 1;
                  CheckOrders = OrdersHistoryTotal();
                  Stat_Close_Pos = 0;
                  NumWin = NumWin + 1;
               }//end if
               else if( Layer > 1 && ( takeprofit + Buffer ) >= MathAbs(Arr_Loss[Layer-1]))//Layer > 1 && TP+Buff > Layer[i-1]
               {      
                  if( Layer > 2  && ( takeprofit + Buffer ) >= MathAbs(Arr_Loss[Layer-1]+Arr_Loss[Layer-2]) && MathAbs(Arr_Loss[1] != 0) )//Layer > 1 && TP+Buff < Layer[i-1]
                  {
                     printf("Layer > 1 & Buffer < Before TWO Layer [TP]");
                     printf("takeprofit: %f",takeprofit);
                     Buffer = ( takeprofit + Buffer ) + (Arr_Loss[Layer - 1] + Arr_Loss[Layer - 2]);
                     Arr_Loss[Layer-1] = 0;
                     Arr_Loss[Layer-2] = 0;
                     Layer = Layer - 3;
                     CheckOrders = OrdersHistoryTotal();
                     Stat_Close_Pos = 0;
                     NumWin = NumWin + 1;
                     printf("Layer: %d",Layer);
                  }//end  if
                  else
                  {
                      printf("Layer > 1 & Buffer > Before Layer [TP]");
                      printf("takeprofit: %f",takeprofit);
                     //printf("TP: %f + Buffer: %f",takeprofit,Buffer);
                     //printf("%f",Arr_Loss[Layer - 1]);
                     Buffer = ( takeprofit + Buffer ) + Arr_Loss[Layer - 1];
                     Arr_Loss[Layer-1] = 0;
                     Layer = Layer - 2;
                     CheckOrders = OrdersHistoryTotal();
                     Stat_Close_Pos = 0;
                     NumWin = NumWin + 1;
                     printf("Layer: %d",Layer);
                }
               }//end else if
               else if( Layer > 1 && ( takeprofit + Buffer ) < MathAbs(Arr_Loss[Layer-1]) )//Layer > 1 && TP+Buff < Layer[i-1]
               {
                  printf("Layer > 1 & Buffer < Before Layer [TP]");
                  printf("takeprofit: %f",takeprofit);
                  Buffer = Buffer + takeprofit;
                  Layer = Layer - 1;
                  CheckOrders = OrdersHistoryTotal();
                  Stat_Close_Pos = 0;
                  NumWin = NumWin + 1;
               }//end else if
            
            }
            else if( AccountBalance() < LastMoney && OrderMagicNumber() == Magic )
            {
               stoploss = OrderProfit() + OrderSwap() + OrderCommission();
               //printf("SL");
               //printf("Stoploss: %f",MathAbs(stoploss));
               if( Layer == 1 && Buffer >= MathAbs(stoploss) )//Layer == 1 & Buffer > SL
               {
                  printf("Layer = 1 & Buffer > SL [SL]");
                  printf("stoploss: %f",takeprofit);
                  Buffer = Buffer + stoploss;
                  Layer = Layer - 1;
                  CheckOrders = OrdersHistoryTotal();
 
               }//end if
               else if( Layer == 1 && Buffer < MathAbs(stoploss) )//Layer == 1 && Buffer < SL
               {
               printf("Layer = 1 & Buffer < SL [SL]");
               printf("stoploss: %f",takeprofit);
                  Arr_Loss[Layer] = stoploss;
                  CheckOrders = OrdersHistoryTotal();
               }//end else if
               else if( Layer > 1 && Buffer < MathAbs(stoploss) )//Layer > 1 && Buffer < SL
               {
               printf("Layer > 1 & Buffer < SL [SL]");
               printf("stoploss: %f",takeprofit);
                  Arr_Loss[Layer] = stoploss;
                  CheckOrders = OrdersHistoryTotal();
               }//end else if
            }//end else if
         }//end if
   }//end if

}
//=======================================================================
bool IsBarClosed(int timeframe,bool reset)
{
    static datetime lastbartime;
    if(timeframe==-1)
    {
        if(reset)
            lastbartime=0;
        else
            lastbartime=iTime(NULL,timeframe,0);
        return(true);
    }
    if(iTime(NULL,timeframe,0)==lastbartime) // wait for new bar
        return(false);
    if(reset)
        lastbartime=iTime(NULL,timeframe,0);
    return(true);
}
//+------------------------------------------------------------------+
//| Expert initialization function                                   |
//+------------------------------------------------------------------+
int OnInit()
  {
//---
      Money = AccountBalance();
      IsBarClosed(-1,false);
      FileDatetime();
      CheckOrders = OrdersHistoryTotal();
      for( int i = 0; i < OrdersTotal(); i++ )
      {
         if( OrderSelect(i,SELECT_BY_POS,MODE_TRADES) )
         {
            if( OrderMagicNumber() == Magic )
            {
               printf("Power Off");
               LastPosition = OrdersTotal();
               comment = OrderComment();
               LastMoney = AccountBalance();
               printf("Comment: %s",comment);
            }
         }
      } 
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
int start()
{
// Do not continue unless the bar is closed
    
   if( LastPosition > 0 )
   {
      CheckOrders = OrdersHistoryTotal();
      Layer = StrToDouble(comment);
      //Layer = Layer - 1;
      printf("LastPosition: %d", Layer);
      printf("Layer: %d",Layer);
   }
   comment = DoubleToStr(Layer+1,0);
   if(!IsBarClosed(0, true)) return(0);
   if( Layer < 5 )
   {
      if( AccountEquity() != 0 && Layer < 5 )
      {
         if( OrdersTotal() == 0 && CheckOrders == OrdersHistoryTotal())
         {
            LastMoney = AccountBalance();
            Open_Pos();
            DownLoadUploadFile();
         }
         else if( OrdersTotal() == 1 && CheckOrders == OrdersHistoryTotal())
         {
            Close_Pos();
            DownLoadUploadFile();
         }
         else if( OrdersTotal() == 0 && CheckOrders != OrdersHistoryTotal() )
         {
            Cal_Layer();
            DownLoadUploadFile();
         }
      }
      LastPosition = 0;
    }
    else 
    {
      for( int i = 0; i < OrdersTotal(); i++ )
      {
         if( OrderSelect(i,SELECT_BY_POS,MODE_TRADES ))
         {
            if( OrderType() == OP_BUY )
            {
               OrderClose(OrderTicket(),Lots,Ask,3,clrBlue);
               OrderClose(OrderTicket(),Lots,Bid,3,clrBlue);
            }
            else if( OrderType() == OP_SELL )
            {
               OrderClose(OrderTicket(),Lots,Ask,3,clrBlue);
               OrderClose(OrderTicket(),Lots,Bid,3,clrBlue);
            }
            
         }
      }
      printf("Error");
    }
    DownLoadUploadFile();
   //printf("Layer: %d",Layer);
   Comment("   \n"
          +"   Balance: "+DoubleToStr(AccountBalance(),2)
          +"   \n"
          +"   Money: "+DoubleToStr(Money,2)
          +"   \n"
          +"   Equity : "+DoubleToStr(AccountEquity(),2)
          +"   \n"
          +"   Layer  : "+IntegerToString(Layer,0)
          +"   \n"
          +"   Status : "+Status
          +"   \n"
          +"   OrdersTotoal : "+DoubleToStr(OrdersTotal(),0)
          +"   \n"
          +"   Total : "+DoubleToStr(total,0)
          +"   \n"
          +"   Buy : "+DoubleToStr(Buy,0)
          +"   Sell : "+DoubleToStr(Sell,0)
          +"   \n"
          +"   Win : "+DoubleToStr(NumWin,0)
          +"   \n"
          +"   Buffer : "+DoubleToStr(Buffer,2)
          +"   \n"
          +"   Layer1 : "+DoubleToStr(Arr_Loss[1],2)
          +"   \n"
          +"   Layer2 : "+DoubleToStr(Arr_Loss[2],2)
          +"   \n"
          +"   Layer3 : "+DoubleToStr(Arr_Loss[3],2)
          +"   \n"
          +"   Layer4 : "+DoubleToStr(Arr_Loss[4],2)
          +"   \n"
   );
   return (0);
}
//+------------------------------------------------------------------+

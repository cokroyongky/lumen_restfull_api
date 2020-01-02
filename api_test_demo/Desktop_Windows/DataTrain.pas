unit DataTrain;

interface

uses
  Winapi.Windows, Winapi.Messages, System.SysUtils, System.Variants, System.Classes, Vcl.Graphics,
  Vcl.Controls, Vcl.Forms, Vcl.Dialogs, Vcl.StdCtrls, Vcl.ExtCtrls, Vcl.Grids, System.json, REST.json, idHTTP,
  IdBaseComponent, IdComponent, IdTCPConnection, IdTCPClient,
  System.Net.URLClient, System.Net.HttpClient, System.Net.HttpClientComponent,
  Vcl.ComCtrls;

type
  TFormData = class(TForm)
    Panel1: TPanel;
    btnView: TButton;
    nethttp: TNetHTTPClient;
    Button1: TButton;
    PageControl1: TPageControl;
    TabSheet1: TTabSheet;
    TabSheet2: TTabSheet;
    Grid1: TStringGrid;
    Memo1: TMemo;
    Edit1: TEdit;
    procedure FormCreate(Sender: TObject);
    procedure btnViewClick(Sender: TObject);
    procedure Button1Click(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
    procedure AturKolom;
  end;

var
  FormData: TFormData;

implementation

{$R *.dfm}
function FormatJSON(json: String): String;
var
  tmpJson: TJsonObject;
begin
  tmpJson := TJSONObject.ParseJSONValue(json) as TJSONObject;
  Result := TJson.Format(tmpJson);

  FreeAndNil(tmpJson);
end;

procedure TFormData.AturKolom;
begin
{    "train_name": "Prabu Jaya",
      "class_name": "Eksekutif & Bisnis",
      "station_departure": "Prabumulih",
      "station_arrived": "Kertapati",
      "departure_time": "09:00:00",
      "arrived_time": "10:21:00"}

  Grid1.RowCount := 2;
  Grid1.ColCount := 7;
  Grid1.Cells [0, 0]  := 'No';
  Grid1.Cells [1, 0]  := 'Train Name';
  Grid1.Cells [2, 0]  := 'Class Name';
  Grid1.Cells [3, 0]  := 'Station Departure';
  Grid1.Cells [4, 0]  := 'Station Arrived';
  Grid1.Cells [5, 0]  := 'Departure Time';
  Grid1.Cells [6, 0]  := 'Arrived Time';

  Grid1.ColWidths [0] := 40;
  Grid1.ColWidths [1] := 175;
  Grid1.ColWidths [2] := 225;
  Grid1.ColWidths [3] := 100;
  Grid1.ColWidths [4] := 100;
  Grid1.ColWidths [5] := 100;
  Grid1.ColWidths [6] := 100;

  Grid1.FixedCols     := 0;
end;

procedure TFormData.btnViewClick(Sender: TObject);
var
  url: string;
  mem: TStringStream;
  str: string;
  jso: TJSONObject;
  jsa: TJSONArray;
  iii: integer;

  MyF : TFormatSettings;
  tgl : string;
  ddd : TDateTime;
begin
  GetLocaleFormatSettings(GetUserDefaultLCID, MyF);
  MyF.DateSeparator := '-';
  MyF.TimeSeparator := ':';
  MyF.ShortDateFormat := 'yyyy-mm-dd';
  MyF.ShortTimeFormat := 'hh:nn:ss';

  mem := TStringStream.Create;
  //url := 'http://raw.githubusercontent.com/cokroyongky/myjson/master/train_schedules.json';
  //url := 'http://researchlumen.lokal/schedule';

  url := Edit1.Text;

  nethttp.get(url, mem, nil);
  str := mem.DataString;

  jso := TJSONObject.ParseJSONValue(str) as TJSONObject;
  jsa := jso.GetValue('data') as TJSONArray;

  Grid1.RowCount := jsa.Count + 1;
  for iii := 0  to jsa.Count -1 do
  begin
    jso := jsa.Items[iii] as TJSONObject;
    Memo1.Clear;
    Memo1.Lines.Add(FormatJSON(str));
    //Memo1.Lines.Add(Format('%d. %s | %s', [iii + 1, jso.GetValue('train_name').Value, jso.GetValue('class_name').Value]));

    Grid1.Cells[0, iii+1] := Format('%d', [iii+1]);
    Grid1.Cells[1, iii+1] := jso.GetValue('train_name').value;
    Grid1.Cells[2, iii+1] := jso.GetValue('class_name').value;
    Grid1.Cells[3, iii+1] := jso.GetValue('station_departure').value;
    Grid1.Cells[4, iii+1] := jso.GetValue('station_arrived').value;
    Grid1.Cells[5, iii+1] := jso.GetValue('departure_time').value;
    Grid1.Cells[6, iii+1] := jso.GetValue('arrived_time').value;

  end;
  mem.Free;
end;


procedure TFormData.Button1Click(Sender: TObject);
var
  jso : TJSONObject;
  mem : TStringStream;
  jss : TJSONObject;
  jsa : TJSONArray;
  url : string;
  str : string;
  iii : integer;

begin
  mem := TStringStream.Create;
  //url := 'http://raw.githubusercontent.com/cokroyongky/myjson/master/train_schedules.json';
  url := 'http://localhost:8010/umroh_book/index.php/admin/Jamaah_view/data_jamaah';
  nethttp.get(url, mem, nil);
  str := mem.DataString;

  Memo1.Clear;
  Memo1.Lines.Add(FormatJSON(str));

  {url :='http://localhost:8010/umroh_book/index.php/admin/Jamaah_view/data_jamaah';
  try
    url := nethttp.Get(url);
    memo1.Clear;
    memo1.Lines.Add(url);
  finally
    FreeAndNil(nethttp);
  end;}

end;

procedure TFormData.FormCreate(Sender: TObject);
begin
  AturKolom;
  //Edit1.Text := '';
end;

end.

program PDataApiTrain;

uses
  Vcl.Forms,
  DataTrain in 'DataTrain.pas' {FormData};

{$R *.res}

begin
  Application.Initialize;
  Application.MainFormOnTaskbar := True;
  Application.CreateForm(TFormData, FormData);
  Application.Run;
end.

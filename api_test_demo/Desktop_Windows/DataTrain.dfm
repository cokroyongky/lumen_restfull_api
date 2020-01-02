object FormData: TFormData
  Left = 0
  Top = 0
  Caption = 'Train Schedule'
  ClientHeight = 549
  ClientWidth = 957
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  OnCreate = FormCreate
  PixelsPerInch = 96
  TextHeight = 13
  object Panel1: TPanel
    AlignWithMargins = True
    Left = 3
    Top = 505
    Width = 951
    Height = 41
    Align = alBottom
    BevelOuter = bvNone
    TabOrder = 0
    object btnView: TButton
      AlignWithMargins = True
      Left = 3
      Top = 3
      Width = 133
      Height = 35
      Align = alLeft
      Caption = 'View Data Train'
      TabOrder = 0
      OnClick = btnViewClick
    end
    object Button1: TButton
      Left = 869
      Top = 3
      Width = 75
      Height = 25
      Caption = 'Button1'
      TabOrder = 1
      Visible = False
      OnClick = Button1Click
    end
    object Edit1: TEdit
      Left = 142
      Top = 11
      Width = 721
      Height = 21
      TabOrder = 2
      Text = 
        'http://raw.githubusercontent.com/cokroyongky/myjson/master/train' +
        '_schedules.json'
      Visible = False
    end
  end
  object PageControl1: TPageControl
    Left = 0
    Top = 0
    Width = 957
    Height = 502
    ActivePage = TabSheet1
    Align = alClient
    TabOrder = 1
    object TabSheet1: TTabSheet
      Caption = 'Data'
      object Grid1: TStringGrid
        AlignWithMargins = True
        Left = 6
        Top = 3
        Width = 937
        Height = 471
        Margins.Left = 6
        Margins.Right = 6
        Margins.Bottom = 0
        Align = alClient
        Options = [goFixedVertLine, goFixedHorzLine, goVertLine, goHorzLine, goRangeSelect, goRowSelect]
        TabOrder = 0
      end
    end
    object TabSheet2: TTabSheet
      Caption = 'Result'
      ImageIndex = 1
      object Memo1: TMemo
        AlignWithMargins = True
        Left = 6
        Top = 3
        Width = 937
        Height = 468
        Margins.Left = 6
        Margins.Right = 6
        Align = alClient
        Lines.Strings = (
          'Memo1')
        ScrollBars = ssVertical
        TabOrder = 0
      end
    end
  end
  object nethttp: TNetHTTPClient
    Asynchronous = False
    ConnectionTimeout = 60000
    ResponseTimeout = 60000
    HandleRedirects = True
    AllowCookies = True
    UserAgent = 'Embarcadero URI Client/1.0'
    Left = 552
    Top = 208
  end
end

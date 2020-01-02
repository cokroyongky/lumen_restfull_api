import 'package:flutter/material.dart';
import 'dart:async';
import 'dart:convert';
import 'package:http/http.dart' as http;

void main() {
  runApp(TrainSchedule());
}

class TrainSchedule extends StatefulWidget {
  TrainScheduleState createState() => TrainScheduleState();
}

class TrainScheduleState extends State<TrainSchedule> {
  final String url = 'http://10.0.2.2:8080/schedule';
  List data;

  Future<String> getData() async {
    var res = await http.get(Uri.encodeFull(url), headers: { 'accept':'application/json' });
    setState(() {
      var content = json.decode(res.body);
      data = content['data'];
    });
    return 'success!';
  }

  Widget build(context) {
    return MaterialApp(
      title: 'Train Schedule',
      home: Scaffold(
          appBar: AppBar(
              title: Text('Train Schedule')
          ),
          body: Container(
            margin: EdgeInsets.all(0.0),
            child: ListView.builder(
              itemCount: data == null ? 0:data.length,
              itemBuilder: (BuildContext context, int index) {
                return Container(
                    child: Card(
                      child: Column(
                        mainAxisSize: MainAxisSize.min,children: <Widget>[
                        ListTile(
                          title: Text(data[index]['train_name'], style: TextStyle(fontSize: 20.0),),
                          trailing: Text(data[index]['class_name'], style: TextStyle(fontSize: 12.0, fontWeight: FontWeight.bold),),
                          subtitle: Column(children: <Widget>[
                            Row(
                              children: <Widget>[
                                Text(data[index]['station_departure']+" -> "+data[index]['station_arrived'], style: TextStyle(fontStyle: FontStyle.italic, fontSize: 12.0),),
                              ],
                            ),
                          ],),
                        ),
                        ButtonTheme.bar(
                          child: ButtonBar(
                            children: <Widget>[
                              FlatButton(
                                child: Text(data[index]['departure_time']+" - "+data[index]['arrived_time']),
                                onPressed: () { /* ... */ },
                              ),
                            ],
                          ),
                        ),
                      ],),
                    )
                );
              },
            ),
          )
      ),
    );
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    this.getData();
  }
}
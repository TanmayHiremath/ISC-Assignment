import { Component,ViewChild, OnInit } from '@angular/core';
import {MatPaginator} from '@angular/material/paginator';
import {MatTableDataSource} from '@angular/material/table';
const   myDataArray = [{"_id":"5e60ad9c0cc4a0e018ba45a4","name":"Berger Prince","roll":1},{"_id":"5e60ad9cf4a11b1f962ebc9f","name":"Earline Daugherty","roll":2},{"_id":"5e60ad9c0d3855e62df7e1ad","name":"Lopez Weber","roll":3},{"_id":"5e60ad9c82124f402d3a6776","name":"Newman Porter","roll":4},{"_id":"5e60ad9ca7100560b248ab74","name":"Celina Ware","roll":5},{"_id":"5e60ad9cfb3a2ae0a1458e0f","name":"Mcmillan Mooney","roll":6},{"_id":"5e60ad9cf4e6a6b4907ec169","name":"Norton Walton","roll":7},{"_id":"5e60ad9c8b36b7d4191a9a37","name":"England Raymond","roll":8},{"_id":"5e60ad9ce6bb0bffb5fdf588","name":"Davenport Dyer","roll":9},{"_id":"5e60ad9c2ae4293ab20e9121","name":"Dolores Frost","roll":10},{"_id":"5e60ad9c58f038f012a2e821","name":"Winters Baker","roll":11},{"_id":"5e60ad9c70ceffeaebe9e97a","name":"Alexis Miranda","roll":12},{"_id":"5e60ad9c6f2a98251d28f59a","name":"Coleen Jacobson","roll":13},{"_id":"5e60ad9c6a4f3f002903b385","name":"Eugenia Melton","roll":14},{"_id":"5e60ad9cafebe27fa339f756","name":"Elizabeth Strickland","roll":15},{"_id":"5e60ad9c0bbbed855ebbf6b0","name":"Merle Lyons","roll":16},{"_id":"5e60ad9c10a641eb688479cd","name":"Morgan Franks","roll":17},{"_id":"5e60ad9ce9bbf5be321a645a","name":"Nash Rollins","roll":18},{"_id":"5e60ad9c052fbc12b5ced73c","name":"Diann Tucker","roll":19},{"_id":"5e60ad9c07f395a24af69739","name":"Oneil Ortiz","roll":20}]


@Component({
  selector: 'app-student',
  templateUrl: './student.component.html',
  styleUrls: ['./student.component.css']
})
export class StudentComponent implements OnInit {

  constructor() { }

  @ViewChild(MatPaginator, {static: true}) paginator: MatPaginator;
  ngOnInit() {
    this.dataSource.paginator = this.paginator;
  }
  title = 'students';
  
  columnsToDisplay = ['roll','name'];
  dataSource = new MatTableDataSource(myDataArray);
  
  applyFilter(event: Event) {
    const filterValue = (event.target as HTMLInputElement).value;
    this.dataSource.filter = filterValue.trim().toLowerCase();
  }

}

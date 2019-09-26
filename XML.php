<?php

if (!$dbconnect = mysqli_connect('localhost', 'root', '')) {
    echo 'Not connected';
    exit;
}
if (!mysqli_select_db($dbconnect,'schoolboarddb')) {
    echo 'Not connected on database';
    exit;
}

$table_id = 'student';
$query = "select student.id, student.firstName, student.lastName, student.board from $table_id left outer join subject on student.id=subject.id_student where board = 'CSMB'";
$dbresult = mysqli_query( $dbconnect, $query) or die("Error on query $query");

$doc = new DOMDocument('1.0');

$root = $doc->createElement('root');
$root = $doc->appendChild($root);

while ($row = mysqli_fetch_assoc($dbresult)) {
    $occ = $doc->createElement($table_id);
    $occ = $root->appendChild($occ);
    foreach ($row as $fieldname => $fieldvalue) {
        $child = $doc->createElement($fieldname);
        $child = $occ->appendChild($child);

        $value = $doc->createTextNode($fieldvalue);
        $value = $child->appendChild($value);
    }
}

$xml_string = $doc->saveXML();
$doc->save('studentsCSMB.xml');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td colspan="2"><h4>Student Details</h4></td>
        </tr>
        <tr>
            <td>
                Name:
            </td>
            <td>
                {{$studentDetails->name}}
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                {{$studentDetails->email}}
            </td>
        </tr>
        <tr>
            <td>
                Class:
            </td>
            <td>
                {{$studentDetails->class}}
            </td>
        </tr>
        <tr>
            <td>
                Roll:
            </td>
            <td>
                {{$studentDetails->roll}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, architecto rerum exercitationem necessitatibus molestias itaque iusto vel! Dicta non fuga facere animi, possimus, quis facilis commodi vitae et hic magni.
            </td>
        </tr>
    </table>
</body>
</html>
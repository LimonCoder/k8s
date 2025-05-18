<!DOCTYPE html>
<html>
<head>
    <title>New Job Posted</title>
</head>
<body>
    <h2>New Job Posted</h2>
    <p><strong>Stack:</strong> {{ $data['stake_name'] }}</p>
    <p><strong>Description:</strong> {{ $data['description'] }}</p>
    <p><strong>Job Title:</strong> {{ $data['job_title'] }}</p>
    <p><strong>Vacancy:</strong> {{ $data['vacancy'] }}</p>
    <p><strong>Salary:</strong> {{ $data['salary'] }}</p>
    <p><strong>Application Deadline:</strong> {{ $data['applied_date'] }}</p>
    <p><strong>Employee Status:</strong> {{ $data['employee_status'] == 1 ? 'Full Time' : 'Part Time' }}</p>
    <p><strong>Education :</strong> {{ $data['education'] }}</p>
    <p><strong>Experience :</strong> {{ $data['experience'] }}</p>
</body>
</html>

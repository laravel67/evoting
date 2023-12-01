
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const candidatesData = @json($candidatesData);
    const colors = {
        // kr: {
        // name: 'South Korea',
        // color: '#FE2371'
        // },
        // jp: {
        // name: 'Japan',
        // color: '#544FC5'
        // },
        // au: {
        // name: 'Australia',
        // color: '#2CAFFE'
        // },
        // de: {
        // name: 'Germany',
        // color: '#FE6A35'
        // },
        // ru: {
        // name: 'Russia',
        // color: '#6B8ABC'
        // },
        // cn: {
        // name: 'China',
        // color: '#1C74BD'
        // },
        // gb: {
        // name: 'Great Britain',
        // color: '#00A6A6'
        // },
        // us: {
        // name: 'United States',
        // color: '#D568FB'
        // }
    };
    const putraCandidates = candidatesData.filter(candidate => candidate.gender === 'Putra');
    const putriCandidates = candidatesData.filter(candidate => candidate.gender === 'Putri');
    createOlympicsChart('chartContainerPutra', putraCandidates, 'Perolehan Suara BEM Putra', colors);
    createOlympicsChart('chartContainerPutri', putriCandidates, 'Perolehan Suara BEM Putri', colors);
    });
    
    function createOlympicsChart(containerId, candidatesData, chartTitle, countries) {
    const chartData = candidatesData.map(candidate => ({
    name_ketua: candidate.name_ketua,
    name_wakil: candidate.name_wakil,
    period: candidate.priode ? candidate.priode.priode : 'Tidak diketahui',
    votes: candidate.votes,
    // Assign a country code based on candidate's name, assuming it's unique
    country: assignCountryCode(candidate.name_ketua)
    }));
    
    const combinedNames = candidatesData.map(candidate =>
    `${candidate.name_ketua} - ${candidate.name_wakil}`
    );
    
    Highcharts.chart(containerId, {
        chart: {
            type: 'column'
        },
        title: {
            text: chartTitle
        },
        xAxis: {
            categories: combinedNames
        },
    yAxis: {
        title: {
            text: 'Jumlah Suara'
        }
    },
    series: [{
        name: 'Suara',
        data: chartData.map(candidate => candidate.votes),
        colorByPoint: true,
        dataLabels: {
        enabled: true,
        inside: true,
        align: 'center',
        verticalAlign: 'middle',
        format: '{point.y}', // Display the number of votes
        style: {
        fontSize: '14px'
        }
        }
    }],
    plotOptions: {
    bar: {
        colors: chartData.map(candidate => {
            const country = countries[candidate.country];
            return country ? country.color : null;
        })
    }}
});
}
function assignCountryCode(name) {
    return name[0].toLowerCase();
}


var totalUsers;
function getTotalUsers() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '{{ route('api.voters') }}',
            success: function(data) {
                totalUsers = data.count;
                updateWidgetValues();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching total users:', error);
            }
        });
    }

    function updateWidgetValues() {
        if (isNaN(totalUsers) || totalUsers <= 0) {
            console.error('Invalid totalUsers value:', totalUsers);
            return;
        }

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '{{ route('api.voted') }}',
            success: function(data) {
                var voted = data;
                var notVoted = totalUsers - voted;
                var votedPercentage = (voted / totalUsers) * 100;
                var notVotedPercentage = (notVoted / totalUsers) * 100;

                $('#voters').html(totalUsers);
                $('#voted').html(voted);
                $('#votedPercentage').html(isNaN(votedPercentage) ? '0%' : votedPercentage.toFixed(1) +
                    '%');
                $('#notVoted').html(notVoted);
                $('#notVotedPercentage').html(isNaN(notVotedPercentage) ? '0%' : notVotedPercentage.toFixed(
                    1) + '%');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching voted data:', error);
            }
        });
    }

    getTotalUsers();
    setInterval(updateWidgetValues, 1000);

    setInterval(function() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '{{ route('api.candidate') }}',
            success: function(data) {
                $('#getCandidates').html(data);
            }
        });
    }, 1000);
</script>

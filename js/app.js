function FrmController($scope, $http) {
	this.tweets = {};

	$scope.SignUp = function(frm) {
		$http.post('server.php', {'uname': $scope.username, 'pswd': $scope.password},
		{headers: {'Accept': 'application/json;odata=verbose'}}
		).success(function(data, status, headers, config) {
				//alert(data.uname); 
				//alert(data.pswd);
				frm.tweets = data;
				//frm.tweets = arts;
				//console.log(frm.tweets);
		}).error(function(data, status) {
		   alert(status);
		});
	};
	
	this.pop = function(){
		this.tweets = arts;
	};
}

var arts = [
		{
			name: 'Azurite',
			body: 'Some gems have hidden qualities beyond their luster, beyond their shine...',
			user: 'Martin',
			createdOn: 1397490980837,
			show: true
		},
		{
			name: 'Lapizlazuli',
			body: 'Origin of the Lapizlazuli is unknown, hence its low value.',
			user: 'Jose',
			createdOn: 1397490980837,
			show: true
		},
		{
			name: 'Diamond',
			body: 'Diamond is our most coveted and sought after gem. You will pay much to be the proud owner of this gorgeous stone',
			user: 'Pepe',
			createdOn: 1397490980837,
			show: true
		}
	];
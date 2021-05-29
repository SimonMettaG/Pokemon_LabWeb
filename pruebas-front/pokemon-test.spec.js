let username = Math.random().toString(36).substring(4);
let mail = username + '@gmail.com';
let pass = '1234'
let roomId = '76074751'

describe('Login tests', () => {
	it('Lets me create an account and log in', () => {
		cy.on('uncaught:exception', () => false);

		cy.visit('http://labweb.games');
		cy.get('input').contains('Register').click();

		cy.get('input[name="name"]').type(username);
		cy.get('input[name="email"]').type(mail);
		cy.get('input[name="password"]').type(pass);
		cy.get('input[name="password_confirmation"]').type(pass);
		cy.get('input').contains('Register').click();

		cy.get('input[name="email"]').type(mail);
		cy.get('input[name="password"]').type(pass);
		cy.get('input').contains('Sign In').click();
	})
});

describe('New team tests', () => {
	it('Lets me create a new team', () => {
		cy.on('uncaught:exception', () => false);

		cy.visit('http://labweb.games');
		cy.get('input[name="email"]').type(mail);
		cy.get('input[name="password"]').type(pass);
		cy.get('input').contains('Sign In').click();

		cy.get('a').contains('Create a team').click();

		cy.get('#name').type('test team');
		cy.get('#pokemon1').select('Ekans');
		cy.get('#pokemon2').select('Mudkip');
		cy.get('#pokemon3').select('Pikachu');
		cy.get('#pokemon4').select('Snorlax');
		cy.get('#pokemon5').select('Minun');
		cy.get('#pokemon6').select('Chatot');
		cy.get('input').contains('Create Team').click();

		cy.contains('test team').parent('tr').within(() => {
			cy.get('a').contains('Show').click();
		})
	})
});

describe('Edit team test', () => {
	it('Lets me edit one of my teams', () => {
		cy.on('uncaught:exception', () => false);

		cy.visit('http://labweb.games');
		cy.get('input[name="email"]').type(mail);
		cy.get('input[name="password"]').type(pass);
		cy.get('input').contains('Sign In').click();

		cy.contains('test team').parent('tr').within(() => {
			cy.get('a').contains('Update').click();
		})
		
		cy.get('input[name="name"]').clear();
		cy.get('input[name="name"]').type('the best');
		cy.get('input').contains('Change Name').click();

		cy.get('tr').eq(2).within(() => {
			cy.get('#move11').select('Toxic');
			cy.get('#move41').select('Protect');
			cy.get('input').contains('Save Pokémon').click();
		})

		cy.get('tr').eq(5).within(() => {
			cy.get('#move24').select('Charm');
			cy.get('#move34').select('Copycat');
			cy.get('input').contains('Save Pokémon').click();
		})

		cy.get('a').contains('See your teams').click({force:true});
		cy.contains('the best').parent('tr').within(() => {
			cy.get('a').contains('Show').click();
		})
	})
});

describe('Join fight tests', () => {
	it('Lets me Join a preexisting fight', () => {
		cy.on('uncaught:exception', () => false);

		cy.visit('http://labweb.games');
		cy.get('input[name="email"]').type(mail);
		cy.get('input[name="password"]').type(pass);
		cy.get('input').contains('Sign In').click();

		cy.contains('the best').parent('tr').within(() => {
			cy.get('a').contains('Fight').click();
		})

		cy.get('input[name="roomId"]').type(roomId);
		cy.get('input').contains('Join', {timeout: 60000}).click();
	})
});
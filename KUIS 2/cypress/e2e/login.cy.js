describe('login admin benar', () => {
  it('passes', () => {
  cy.visit('http://localhost/konseling/session/login.php')
  // isi form email 
  cy.get('input[name="username"]').type('admin')

  // isi form password
  cy.get('input[name="password"]').type('admin123')

  // press tombol bernama login
  cy.get('button[name="login"]').click()

  //
})
})

describe('login admin salah 1', () => {
  it('passes', () => {
  cy.visit('http://localhost/konseling/session/login.php')
  // isi form email 
  cy.get('input[name="username"]').type('admin')

  // isi form password
  cy.get('input[name="password"]').type('admin')

  // press tombol bernama login
  cy.get('button[name="login"]').click()

  //
})
})

describe('login admin salah 2', () => {
  it('passes', () => {
  cy.visit('http://localhost/konseling/session/login.php')
  // isi form email 
  cy.get('input[name="username"]').type('admin123')

  // isi form password
  cy.get('input[name="password"]').type('admin123')

  // press tombol bernama login
  cy.get('button[name="login"]').click()

  //
})
})






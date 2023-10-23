
it('should login success when submit a valid sign up form', () => {
  cy.visit('/#/register')
  cy.get('input[placeholder="Your Name"]').type('test')
  cy.get('input[placeholder="Email"]').type('test@gmail.com')
  cy.get('[type="password"]').type('12345678')
  cy.get('[type="submit"]').contains('Sign up').should('not.have.attr', 'disabled')
  cy.get('[type="submit"]').contains('Sign up').click()
  cy.url().should('match', /\/#\/$/)
})

import React from 'react';

export default class Crud extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      error: null,
      isLoaded: false,
      items: {},
    };
  }

  componentDidMount() {
    //appel l'api à l'affichage puis toute les heures
    this.getApi();
  }

  getApi() {

  }
  
  render() {
    const { error, isLoaded, items } = this.state;
    return (
        <p>hello</p>
    );
  }
}
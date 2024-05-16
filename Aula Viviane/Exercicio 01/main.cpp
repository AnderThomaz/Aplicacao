#include <iostream>
#include <stdio.h>
#include <stdlib.h>


using namespace std;

int main()
{


    float altura, pesoIdeal;
    int sexo;
    printf("Qual sua altura? ");
    scanf("%f", &altura);

    printf("Qual seu sexo? \n");

    printf("Digite 1 - Masculino - ");
    printf("Digite 2 - Feminino\n");

    scanf("%d", &sexo);

    if (sexo = 1) {
        pesoIdeal = (72.7 * altura) - 58;
        printf("Seu peso ideal e de %2.f", pesoIdeal);
    }else {
        pesoIdeal = (62.1 * altura) - 44.7;
        printf("Seu peso ideal e de %2.f Kg", pesoIdeal);
    }


    return 0;
}

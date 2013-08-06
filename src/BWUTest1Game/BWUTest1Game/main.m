//
//  main.m
//  BWUTest1Game
//
//  Created by Kostya Kolesnyk on 8/6/13.
//  Copyright (c) 2013 Kostya Kolesnyk. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "BaseTest.h"
#import "Game.h"

int main(int argc, const char * argv[])
{

    @autoreleasepool {
        
        BaseTest * baseTest = [[BaseTest alloc] init];
        for (NSArray * testData in baseTest.testData) {
            Game * game = [[Game alloc] initWithString:testData[0]];
            NSString * testResult = testData[1];
            NSString * myResult = [game processGame];
            NSLog(@"\nString: %@\nTest Result: %@\n\nMy Result: %@\n\n", testData[0], testResult, myResult);
        }
        
    }
    return 0;
}


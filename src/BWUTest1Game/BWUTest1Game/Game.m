//
//  Game.m
//  BWUTest1Game
//
//  Created by Kostya Kolesnyk on 8/6/13.
//  Copyright (c) 2013 Kostya Kolesnyk. All rights reserved.
//

#import "Game.h"

#define WIN_FIRST @"First"
#define WIN_SECOND @"Second"

@implementation Game

- (id)initWithString: (NSString *)string
{
    self = [super init];
    self.string = string;
    return self;
}

-(NSString *)processGame
{
    /// Побудова словника який містить кількості повторень кожного символу
    NSMutableDictionary * charsCounts = [NSMutableDictionary dictionary];
    for (int i = 0; i < self.string.length; i++) {
        NSString * letter = [self.string substringWithRange:NSMakeRange(i, 1)];
        if ([charsCounts objectForKey:letter]) {
            int curCount = [[charsCounts objectForKey:letter] intValue];
            curCount ++;
            [charsCounts setValue:[NSNumber numberWithInt:curCount] forKey:letter];
        }
        else {
            [charsCounts setValue:[NSNumber numberWithInt:1] forKey:letter];
        }
    }
    
    /// Підрахунок кількості "непарних" символів
    int unpairedCount = 0;
    for (NSString * key in charsCounts) {
        int value = [[charsCounts objectForKey:key] intValue];
        if (value % 2 == 1) unpairedCount++;
    }
    
    /// Якщо кількість непарних символів непарна або дорівнює нулю - переміг перший гравець
    if (unpairedCount == 0 || unpairedCount % 2 == 1)
        return WIN_FIRST;
    else
        return WIN_SECOND;
    
}

@end
